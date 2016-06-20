<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Speciality;
use App\Establishment;
use App\EstablishmentHasSpeciality;
use App\UserHasEstablishment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else { // $unit = 'M'
        return $miles;
    }
}
class SearchController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function details($id)
    {
        $coord = array();

        // $user = User::find($id);
        $users = DB::table('users')
            // ->join('user_has_establishment', 'users.id', '=', 'user_has_establishment.user_id')
            ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('users.id', '=', $id)
            ->select( 'users.*', 'establishment.address', 'specialities.intituleProf', 'establishment.horaire',
                'establishment.nameE', 'establishment.textLatlng', 'establishment.id as idEs', 'users.id as idUE')
            ->get();
        foreach($users as $user)
        {
            $rdvs = DB::table('rdv')->where('rdv.user_id', '=', $user->id)
                ->select('rdv.hour')->get();

            $user->rdvs = array();
            foreach($rdvs as $r){
                $user->rdvs[] = strtotime($r->hour);
            }
            list($latitude, $longitude)=explode(",", $user->textLatlng );
            $coord[]['lat'] = $latitude;
            $coord[]['long'] = $longitude;

        }




        $specialities = Speciality::all();

        return view('details')
            ->with('users', $users)
            ->with('specialities', $specialities)
            ->with('coord', $coord);
        // ->with('detail', $detail);




    }

    /**
     *
    Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $inputs = $request->all();


        /*  echo '<pre>';
          print_r($inputs);
          exit();
        */

        $address = $inputs['address'];
        $spec = $inputs['speciality'];
        $name = $inputs['name'];
        $coord = array();
        if(isset($inputs['lat']) && isset($inputs['long'])&& !empty($inputs['lat']) && !empty($inputs['long'])){

            $users = DB::table('users')
                ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
                ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
                ->where('users.role', '=', '20')
                ->select('users.*', 'establishment.address', 'specialities.intituleProf', 'establishment.horaire',
                    'establishment.nameE', 'establishment.textLatlng', 'establishment.id as idEs',
                    'users.id as idUE', 'count(users.id) as total');


            // ->toSql();

            /*  echo '<pre>';
              print_r($users);
              exit();*/
            // ->get();
            if (isset($inputs['name']) && !empty($inputs['name'])) {
                $users->where('users.name', 'like', '%' . $name . '%');
            }
            if (isset($inputs['speciality']) && $inputs['speciality'] != -1) {
                $users->where('users.speciality_id', '=', $spec);
            }
            // $req = $users;
            //$users = $users->get();
            $users = $users->paginate(5);
            $tot = $users->count();

            foreach($users as $k=>$user){
                list($lat, $long) = explode(",",  $user->textLatlng);
                $distance2 = distance($lat, $long, $inputs['lat'], $inputs['long'], "K");
                if($distance2 > 5.00){
                    unset($users[$k]);
                }
            }
            foreach($users as $user)
            {
                $rdvs = DB::table('rdv')->where('rdv.user_id', '=', $user->id)
                    ->select('rdv.hour')->get();
                $user->rdvs = array();
                foreach($rdvs as $r){
                    $user->rdvs[] = $r->hour;
                }

                list($latitude, $longitude)=explode(",", $user->textLatlng );
                $coord[]['lat'] = $latitude;
                $coord[]['long'] = $longitude;
            }
            $specialities = Speciality::all();

            $users->appends(array(
                'address' => $inputs['address'],
                'speciality'   => $inputs['speciality'],
                'name'   => $inputs['name'],
                'lat' => $inputs['lat'],
                'long' => $inputs['long'],
            ));
            return view('search')
                ->with('users', $users)
                ->with('specialities', $specialities)
                ->with('tot', $tot);

        }
        else if(isset($inputs['address']) && empty($inputs['address']) && isset($inputs['speciality']) && $inputs['speciality'] == -1
            && isset($inputs['name']) && empty($inputs['name'])){
            $users = array();
            $tot =0;
            $specialities = Speciality::all();
       /*     $specialities->appends(array(
                'address' => $inputs['address'],
                'speciality'   => $inputs['speciality'],
                'name'   => $inputs['name'],
                'lat' => $inputs['lat'],
                'long' => $inputs['long'],
            ));**/
            return view('search')
                ->with('users', $users)
                ->with('specialities', $specialities)
                ->with('tot', $tot);
        }
        else {


            $users = DB::table('users')
                ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
                ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
                ->where('users.role', '=', '20')
                ->select('users.*', 'establishment.address', 'specialities.intituleProf', 'establishment.horaire',
                    'establishment.nameE', 'establishment.textLatlng', 'establishment.id as idEs',
                    'users.id as idUE');


            //  ->where('users.speciality_id', '=', $spec)
            // ->where('users.name', 'LIKE', '%'+$name+'%')
            // ->where('establishment.address', 'like', '%'+$address+'%')        //   ->get();
            if (isset($inputs['address']) && !empty($inputs['address'])) {
                $users->where('establishment.address', 'like', '%' . $address . '%');
            }
            if (isset($inputs['name']) && !empty($inputs['name'])) {
                $users->where('users.name', 'like', '%' . $name . '%');
            }
            if (isset($inputs['speciality']) && $inputs['speciality'] != -1) {
                $users->where('users.speciality_id', '=', $spec);
            }
            $tot = $users->count();
            $req = $users;
            //$users = $users->get();
            $users = $users->paginate(5);
            foreach($users as $user)
            {
                $rdvs = DB::table('rdv')->where('rdv.user_id', '=', $user->id)
                    ->select('rdv.hour')->get();
                $user->rdvs = array();
                foreach($rdvs as $r){
                    $user->rdvs[] = strtotime($r->hour);
                }
                list($latitude, $longitude)=explode(",", $user->textLatlng );
                $coord[]['lat'] = $latitude;
                $coord[]['long'] = $longitude;
            }
            /*  print_r($user);
              exit();*/
            $specialities = Speciality::all();
            $users->appends(array(
                'address' => $inputs['address'],
                'speciality'   => $inputs['speciality'],
                'name'   => $inputs['name'],
                'lat' => $inputs['lat'],
                'long' => $inputs['long'],
            ));
            return view('search'
                //, ['users' => $users]
                )
                ->with('users', $users)
                ->with('specialities', $specialities)
                ->with('coord', $coord)->with('tot', $tot)
                ->with('req', $req)
                ->render();

        }



        /*  echo '<pre>';
          print_r($users);
          print_r($spec);
          print_r($address);
          print_r($name);
          exit();*/
        /*  echo '<pre>';
          print_r($tot);
          exit();
  */


    }



}
