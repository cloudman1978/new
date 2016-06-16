<?php

namespace App\Http\Controllers;

use App\Insurance;
use App\Rdv;
use App\Speciality;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use Crypt;
use Hash;
use App\Patient;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\InsuranceHasPatient;

class RDVController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function step1($id)
    {
       // $user = User::find($id);
        $users = DB::table('users')
         //   ->join('user_has_establishment', 'users.id', '=', 'user_has_establishment.user_id')
            ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('users.id', '=', $id)
            ->select( 'users.*', 'establishment.address', 'specialities.intituleProf', 'establishment.horaire',
                 'establishment.textLatlng', 'establishment.id as idEs', 'users.id as idUE', 'establishment.nameE')
            ->get();
        foreach($users as $user)
        {
            $rdvs = DB::table('rdv')->where('rdv.user_id', '=', $user->id)
                ->select('rdv.hour')->get();
            $user->rdvs = array();
            foreach($rdvs as $r){
                $user->rdvs[] = strtotime($r->hour);
            }
        }
        $user = $users[0];

      /*  echo '<pre>';
        print_r($user);
        exit();
      */
        $specialities = Speciality::all();
        return view('rdv1')->with('user', $user)
            ->with('specialities', $specialities);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function step2($id)
    {
        $users = DB::table('users')
         //  ->join('user_has_establishment', 'users.id', '=', 'user_has_establishment.user_id')
            ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('users.id', '=', $id)
            ->select( 'users.*', 'establishment.address', 'specialities.intituleProf', 'establishment.horaire',
                'establishment.textLatlng', 'establishment.id as idEs', 'users.id as idUE', 'establishment.nameE')
            ->get();
        $user = $users[0];
        $specialities = Speciality::all();
        $insurances = Insurance::all();
        return view('rdv2')->with('user', $user)
            ->with('specialities', $specialities)
            ->with('insurances', $insurances);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function step3(Request $request ,$id)
    {
        $specialities = Speciality::all();
        $users = DB::table('users')
          //  ->join('user_has_establishment', 'users.id', '=', 'user_has_establishment.user_id')
            ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('users.id', '=', $id)
            ->select( 'users.*', 'establishment.address', 'specialities.intituleProf', 'establishment.horaire',
                'establishment.textLatlng', 'establishment.id as idEs', 'users.id as idUE', 'establishment.nameE')
            ->get();

        $user = $users[0];



        $inputs = $request->all();
        if($inputs['type'] == 'new'){
            Validator::make($inputs, [
                'name' => 'required|max:255',
                'cin' => 'required|max:255|unique:patients',
                'email' => 'required|email|max:255|unique:patients',
                'password' => 'required|confirmed|min:6',
                'tel' => 'required',
                'birthDate' => 'required|date|before:2000-01-01',
                'gender' => 'required|max:255',
                'address' => 'required|max:255',
                'height' => 'required',
                'size' => 'required'

            ]);
        $patient =    Patient::create([
                'name' => $inputs['name'],
                'cin' => $inputs['cin'],
                'email' => $inputs['email'],
                'password' => bcrypt($inputs['password']),
                'tel' => $inputs['tel'],
                'birthDate' => $inputs['birthDate'],
                'gender' => $inputs['gender'],
            'address' =>$inputs['address'],
                'height' => $inputs['height'],
                'size' => $inputs['size'],

            ]);
            $inss = Insurance::all();
            $insurances = array();
            foreach($inss as $i) {
                if (isset($inputs['ins' . $i->id]) && !empty($inputs['ins' . $i->id])) {

                    $insurances[$i->id]['insurance_id'] = $i->id;
                    $insurances[$i->id]['affiliation'] = $inputs['aff' . $i->id];

                    unset($inputs['ins' . $i->id]);
                    unset($inputs['aff' . $i->id]);

                }
                else {
                    unset($inputs['aff' . $i->id]);
                }
            }
            foreach($insurances as $ins){


                InsuranceHasPatient::create([
                    'insurance_id' => $ins['insurance_id'],
                    'affiliation' => $ins['affiliation'],
                    'patient_id' => $patient->getKey()
                ]);
            }
            $request->session()->push('patient', 'Bienvenue'.$patient);
            return view('rdv3')->with('user', $user)
                ->with('patient', $patient)
                ->with('specialities', $specialities);
        }
        else {

            /*    $mail = $inputs['email'];
                $pass = ;*/
        /*    echo '<pre>';
            print_r();
            exit();*/
                $patient = DB::table('patients')
                    ->where('email', 'like', $inputs['email'])
                    ->first();
                if (Hash::check($inputs['password'], $patient->password)) {
                    $request->session()->push('patient', 'Bienvenue' . $patient->name);
                    return view('rdv3')->with('user', $user)
                        ->with('specialities', $specialities)
                        ->with('patient', $patient);
                } else {
                    return Redirect::to('rdv2/{user}')
                        ->with('specialities', $specialities)
                        ->withErrors('mot de passe ou email  non valides');
                }
            }


        return view('rdv3')->with('user', $user)
            ->with('specialities', $specialities);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function step4(Request $request, $id)
    {
        $users = DB::table('users')
         //   ->join('user_has_establishment', 'users.id', '=', 'user_has_establishment.user_id')
            ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('users.id', '=', $id)
            ->select( 'users.*', 'establishment.address', 'specialities.intituleProf', 'establishment.horaire',
                'establishment.textLatlng', 'establishment.id as idEs', 'users.id as idUE', 'establishment.nameE')
            ->get();
        $user = $users[0];
        $inputs = $request->all();
        $specialities = Speciality::all();

    /*   echo '<pre>';
        print_r($_GET);
        exit();*/

       Rdv::create([
            'date' => date("Y:m:d", $_GET['heure']),
             'hour' => date("Y:m:d H:i:s", $_GET['heure']),
             'state' => 10,
            'rqs' => $inputs['ttt'],
            'establishment_id' => $user->idEs,
            'patient_id' => $_GET['patient'],
           'user_id' => $user->id,

       ]);

        return view('rdv4')->with('user', $user)
            ->with('specialities', $specialities);

    }
}


