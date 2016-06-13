<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establishment;
use App\Type;
use App\User;
use App\Speciality;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\EstablishmentHasSpeciality;

class AdminEstablishmentController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nameE' => 'required|max:255',
            'address' => 'required|max:255',
            'textLatlng' => 'required',
            'tel' => 'required|unique:establishment',
           // 'tel1' => 'required',
            'speciality_id' => 'required',
            'type_id' => 'required',
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$establishments = Establishment ::all();
         $establishments = DB::table('establishment')
            ->join('types', 'types.id', '=', 'establishment.type_id')
            ->select('establishment.*', 'types.titre')
            ->get();

       // echo "<pre>";
       // print_r($establishments);
        //exit();
            foreach($establishments as $establishment){
                $id = $establishment->id;

        $specialities = DB::table('establishment_has_speciality')
            ->join('establishment', 'establishment.id', '=', 'establishment_has_speciality.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'establishment_has_speciality.speciality_id')
            ->where('establishment.id', '=', $id)
            ->select( 'specialities.intituleEtab')
            ->get();
       $establishment->specialities = $specialities;

    }
        foreach($establishments as $establishment){
            $id = $establishment->id;

            $users = DB::table('users')
                ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
                ->where('users.establishment_id', '=', $id)
                ->select( 'users.name')
                ->get();
            $establishment->users = $users;

        }



       // print_r($establishments);
       // exit();

        return view('backoffice.admin.establishment.index')
                ->with('establishments', $establishments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality ::all();
        $types = Type ::all();
        $users = DB::table('users')->where('role', '=', '20')->orwhere('role', '=', '30')->get();
        return view('backoffice.admin.establishment.create')
            ->with('specialities', $specialities)
            ->with('types', $types)
            ->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        if(!empty($inputs['logo'])){
            $file = array('logo' => Input::file('logo'));

            // checking file is valid.
            // if (Input::file('image')->isValid()) {
            $destinationPath = 'images'; // upload path
            $extension = Input::file('logo')->getClientOriginalExtension(); // getting image extension
            $fileName = str_random(4).'-'.$request->nameE.'.'.$extension; // renameing image
            Input::file('logo')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            Session::flash('success', 'Upload successfully');


            $inputs['logo'] = $fileName;}



        $tab = array();

        $tab['jours'] = $inputs['jours'];
        $tab['freq'] = $inputs['freq'];
        $tab['time'] = $inputs['time'];




        unset($inputs['freq']);

        unset($inputs['jours']);
        unset($inputs['time']);



        $inputs['horaire'] = serialize( $tab);
        echo serialize( $tab);
     /*   echo '<pre>';
        print_r($tab);
        exit();

*/

        if(isset($inputs['speciality_id']) && !empty($inputs['speciality_id'])){

            $specialities = $inputs['speciality_id'];
            unset($inputs['speciality_id']);
            $estab = Establishment::create($inputs);
            // $establishment = Establishment::find($inputs['name']);

            foreach($specialities as $speciality){

                // echo $selectValue."<br>";
                EstablishmentHasSpeciality::create([
                    'establishment_id' => $estab->getKey(),
                    'speciality_id' => $speciality
                ]);
            }

        }
        else  if(isset($inputs['speciality_id']) && !empty($inputs['speciality_id'])){

            $specialities = $inputs['speciality_id'];
            unset($inputs['speciality_id']);


            $estab = Establishment::create($inputs);
            // $establishment = Establishment::find($inputs['name']);

            foreach($specialities as $speciality){

                // echo $selectValue."<br>";
                EstablishmentHasSpeciality::create([
                    'establishment_id' => $estab->getKey(),
                    'speciality_id' => $speciality
                ]);
            }
            }

        else{
            unset($inputs['speciality_id']);
            $estab = Establishment::create($inputs);
        }


     /*   echo '<pre>';
        print_r($inputs);
        exit();

     */

        return redirect()->action('AdminEstablishmentController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $establishment = Establishment::find($id);
         /* $establishments = DB::table('establishment')
            ->join('types', 'types.id', '=', 'establishment.type_id')
            ->join('specialities', 'specialities.id', '=', 'establishment.speciality_id')
            ->select('establishment.*', 'specialities.intituleEtab', 'types.titre')
            ->get();*/
        $type = Type::find($establishment->type_id);;

        $speciality = DB::table('establishment_has_speciality')
            ->join('establishment', 'establishment.id', '=', 'establishment_has_speciality.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'establishment_has_speciality.speciality_id')
            ->select('specialities.*')
            ->where('establishment.id', '=', $id)
            ->get();

        $users = DB::table('users')
            ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->select('users.name')
            ->where('users.establishment_id', '=', $id)
            ->get();

        $tab = unserialize($establishment->horaire);
        $time = $tab['time'];

        return view('backoffice.admin.establishment.show')
            ->with('establishment', $establishment)
            ->with('type', $type)
           ->with('speciality', $speciality)
            ->with('tab', $tab)
            ->with('time', $time)
            ->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $establishment = Establishment::find($id);
        $establishment = DB::table('establishment')->where('id', $id)->first();
          $specialities = Speciality ::all();
        $types = Type ::all();
        $users = DB::table('users')->where('role', '=', '20')->orwhere('role', '=', '30')->get();
        $tab = unserialize( $establishment->horaire );

      $time = $tab['time'];

        /*  echo '<pre>';
          print_r($matin['deb']);
          print_r($matin['deb']);
              exit();
      */

        return view('backoffice.admin.establishment.edit', compact('establishment', $establishment))
            ->with('specialities', $specialities)
            ->with('types', $types)
            ->with('users', $users)
            ->with('tab', $tab)
            ->with('time', $time);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $establishment = Establishment::find($id);
       // $establishment = DB::table('establishment')->where('id', $id)->first();
        $specialities = Speciality ::all();
        $types = Type ::all();
        $users = User::all();

        $inputs = $request->all();

       // print_r($inputs);
       // print_r($establishment);
       // exit();
        $establishment->nameE = $inputs['nameE'];
        $establishment->address = $inputs['address'];
        $establishment->textLatlng = $inputs['textLatlng'];
        $establishment->tel = $inputs['tel'];
        $establishment->tel1 = $inputs['tel1'];
        $establishment->email = $inputs['email'];

       // $establishment->speciality_id = $inputs['speciality_id'];
        $establishment->type_id = $inputs['type_id'];

        if(!empty($inputs['logo'])){
        $file = array('logo' => Input::file('logo'));

            // checking file is valid.
            // if (Input::file('image')->isValid()) {
            $destinationPath = 'images'; // upload path
            $extension = Input::file('logo')->getClientOriginalExtension(); // getting image extension
            $fileName = str_random(4).'-'.$request->nameE.'.'.$extension; // renameing image
            Input::file('logo')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            Session::flash('success', 'Upload successfully');


        $establishment->logo = $fileName;}

          //  $establishment->logo = $inputs['logo'];

        else if(!empty($inputs['logoInitial'])){
            $establishment->logo = $inputs['logoInitial'];
            unset( $inputs['logoInitial']);
        }


        $tab = array();

        $tab['jours'] = $inputs['jours'];
        $tab['freq'] = $inputs['freq'];
        $tab['time'] = $inputs['time'];




        unset($inputs['freq']);

        unset($inputs['jours']);
        unset($inputs['time']);



        $inputs['horaire'] = serialize( $tab);



        $establishment->horaire = serialize( $tab);


        if(isset($inputs['speciality_id']) && !empty($inputs['speciality_id'])){

            $specialities = $inputs['speciality_id'];
            unset($inputs['speciality_id']);

            $establishment->save();
           // DB::table('user_has_establishment')->where('establishment_id', '=', $establishment->id)->delete();
            DB::table('establishment_has_speciality')->where('establishment_id', '=', $establishment->id)->delete();

            foreach($specialities as $speciality){

                // echo $selectValue."<br>";
                EstablishmentHasSpeciality::create([
                    'establishment_id' => $establishment->id,
                    'speciality_id' => $speciality
                ]);
            }
        }
        else{
            unset($inputs['speciality_id']);
            $establishment->save();
        }


        return redirect()->route('backoffice.admin.establishment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $establishment = Establishment::find($id)
            ->delete();
        return redirect()->route('backoffice.admin.establishment.index');
    }
}
