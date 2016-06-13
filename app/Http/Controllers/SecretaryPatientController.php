<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patient;
use Validator;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Insurance;
use App\InsuranceHasPatient;
use App\Rdv;
use App\Establishment;
use App\Type;

class SecretaryPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::id();
        $user = User::find($id);

        $patients = DB::table('patients')
            ->join('rdv', 'patients.id', '=', 'rdv.patient_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
             ->where('rdv.establishment_id', '=', $user->establishment_id)
            ->select( 'patients.*', 'establishment.nameE', 'rdv.establishment_id')
            ->distinct()
            ->get();
        foreach($patients as $patient) {

            $id = $patient->id;
            $insurances = DB::table('insurance_has_patient')
                ->join('insurances', 'insurances.id', '=', 'insurance_has_patient.insurance_id')
                ->join('patients', 'patients.id', '=', 'insurance_has_patient.patient_id')
                ->where('patients.id', '=', $id)
                ->select('insurances.pseudo')
                ->get();
            $patient->insurances = $insurances;
        }

        $date = date('Y-m-d', time());
        return view('backoffice.secretary.patient.index')
            ->with('patients', $patients)
            ->with('date', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insurances = Insurance ::all();
        $date = date('Y-m-d', time());
        return view('backoffice.secretary.patient.create')
            ->with('insurances', $insurances)
            ->with('date', $date);
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

        $validator=  Validator::make($inputs, [
            'height' => 'required|regex:/^\d*(\.\d{2})?$/',
            'size' =>   'required',
            'name' => 'required|max:255',
            'cin' => 'required|max:255|unique:patients',
            'email' => 'required|email|max:255|unique:patients',
            'password' => 'required|confirmed|min:6',
            'tel' => 'required',
            'birthDate' => 'required|date|before:2016-06-10',
            'gender' => 'required|max:255',
            'address' => 'required|max:255'
        ]);
        if($validator->fails()){
           // return Redirect::to('rdv2/{user}')->withErrors('mot de passe ou email  non valides');
            $this->throwValidationException(
                $request, $validator
            );
        }
        list($month, $day, $year)
            =explode("/",  $inputs['birthDate']);
        $inputs['birthDate'] = $year.'-'.$month.'-'.$day;
        $inputs['password'] = bcrypt($inputs['password']);
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
     /*   echo '<pre>';
        print_r($inputs);
        exit();*/


            $patient = Patient::create($inputs);


            foreach($insurances as $ins){


                InsuranceHasPatient::create([
                    'insurance_id' => $ins['insurance_id'],
                    'affiliation' => $ins['affiliation'],
                    'patient_id' => $patient->getKey()
                ]);
            }


        //return redirect()->action('SecretaryRdvController@create');
        $id= Auth::id();
        $user = User::find($id);
        $id= Auth::id();
        $user = User::find($id);


        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);



        $users = DB::table('users')
            ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->where('users.establishment_id', '=' ,$ide)
            ->where('users.role', '=', '20')
            ->select( 'users.*', 'establishment.nameE')
            ->get();

      /*  echo '<pre>';
        print_r($users);
        exit();*/
        $date = date('Y-m-d', time());

        return view('backoffice.secretary.patient.rdv')
            ->with('patient', $patient)
            ->with('date', $date)
            ->with('establishment', $establishment)
            ->with('users', $users)
            ->with('type', $type);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        $insurances = DB::table('insurance_has_patient')
            ->join('patients', 'patients.id', '=', 'insurance_has_patient.patient_id')
            ->join('insurances', 'insurances.id', '=', 'insurance_has_patient.insurance_id')
            ->select('insurances.pseudo', 'insurance_has_patient.affiliation')
            ->where('insurance_has_patient.patient_id', '=', $id)
            ->get();
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);


        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        return view('backoffice.secretary.patient.show')
            ->with('patient', $patient)
            ->with('insurances', $insurances)
            ->with('type', $type)
            ->with('date', $date);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        $insurances = DB::table('insurances')
            ->join('insurance_has_patient', 'insurances.id', '=', 'insurance_has_patient.insurance_id')
            ->join('patients', 'patients.id', '=', 'insurance_has_patient.patient_id')
            ->select('insurances.*', 'insurance_has_patient.affiliation')
            ->where('insurance_has_patient.patient_id', '=', $id)
            ->get();
        $id= Auth::id();
        $user = User::find($id);


        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $inss = Insurance::all();
        $date = date('Y-m-d', time());
        return view('backoffice.secretary.patient.edit')
            ->with('patient', $patient)
            ->with('insurances', $insurances)
            ->with('inss', $inss)
            ->with('date', $date)
            ->with('type', $type);
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
        $inputs = $request->all();
        $validator=  Validator::make($inputs, [
            'height' => 'required|regex:/^\d*(\.\d{2})?$/',
            'size' =>   'required',
            'name' => 'required|max:255',
            'cin' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
            'tel' => 'required',
            'birthDate' => 'required|date',
            'gender' => 'required|max:255',
            'address' => 'required|max:255'
        ]);
        if($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $patient = Patient::find($id);
        $patient->name = $inputs['name'];
        $patient->email = $inputs['email'];
        $patient->password =bcrypt( $inputs['password']);
        $patient->tel = $inputs['tel'];
        if(strstr($request->birthDate, "/")){
        list($month, $day, $year)
            =explode("/",  $inputs['birthDate']);
        $inputs['birthDate'] = $year.'-'.$month.'-'.$day;}
        $patient->birthDate =  $inputs['birthDate'];
        $patient->gender = $inputs['gender'];
        $patient->address = $inputs['address'];
        $patient->height = $inputs['height'];
        $patient->size = $inputs['size'];



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
       /*   echo '<pre>';
           print_r($inputs);
           exit();*/

        DB::table('insurance_has_patient')->where('patient_id', '=', $patient->id)->delete();
        foreach($insurances as $ins){


            InsuranceHasPatient::create([
                'insurance_id' => $ins['insurance_id'],
                'affiliation' => $ins['affiliation'],
                'patient_id' => $patient->getKey()
            ]);
        }




        $patient->save();

        $id= Auth::id();
        $user = User::find($id);


        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);

        $date = date('Y-m-d', time());
        return redirect()->route('backoffice.secretary.patient.index')
            ->with('date', $date)
            ->with('type', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Patient::find($id)
                ->delete();
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);


        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        return redirect()->route('backoffice.secretary.patient.index')
            ->with('date', $date)
            ->with('type', $type);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rdv(Request $request)
    {
        $inputs = $request->all();
        list($date, $hour)=explode(" ", $inputs['hour']);
        list($month, $day, $year)
            =explode("/",  $date);
        $inputs['date'] = $year.'-'.$month.'-'.$day;
        $inputs['hour'] =$inputs['date'].' '.$hour.':00';
        /*   print_r($inputs);
           exit();
        */
        unset($inputs['establishment_name']);
        unset($inputs['patient_name']);

    /*   echo '<pre>';
        print_r($inputs);
        exit();*/

        $rdv = Rdv::create($inputs);
        $id= Auth::id();
        $user = User::find($id);


        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $date = date('Y-m-d', time());
        return redirect()->action('SecretaryPatientController@index')
            ->with('date', $date)
            ->with('type', $type);
    }
}