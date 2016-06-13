<?php

namespace App\Http\Controllers;

use App\Insurance;
use App\InsuranceHasPatient;
use App\Patient;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;

class AdminPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = DB::table('patients')
            ->select('patients.*')
            ->get();

        foreach($patients as $patient){

            $id = $patient->id;

            $insurances = DB::table('insurance_has_patient')
                ->join('insurances', 'insurances.id', '=', 'insurance_has_patient.insurance_id')
                ->join('patients', 'patients.id', '=', 'insurance_has_patient.patient_id')
                ->where('patients.id', '=', $id)
                ->select( 'insurances.pseudo')
                ->get();
            $patient->insurances = $insurances;

        }
        return view('backoffice.admin.patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insurances = Insurance ::all();
        return view('backoffice.admin.patients.create')
            ->with('insurances', $insurances);
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


        return redirect()->action('AdminPatientController@index');


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
            ->select('insurances.*', 'insurance_has_patient.affiliation')
            ->where('insurance_has_patient.patient_id', '=', $id)
            ->get();

        return view('backoffice.admin.patients.show')->with('patient', $patient)
            ->with('insurances', $insurances);
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
        $inss = Insurance::all();




        return view('backoffice.admin.patients.edit', compact('patient', $patient))
            ->with('insurances', $insurances)
            ->with('inss', $inss);
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
        ]);
        if($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $patient = Patient::find($id);
        $inputs = $request->all();
        $patient->name = $inputs['name'];
        $patient->cin = $inputs['cin'];
        $patient->tel = $inputs['tel'];
        $patient->gender = $inputs['gender'];
        $patient->email = $inputs['email'];
        if(strstr($request->birthDate, "/")){
            list($month, $day, $year)
                =explode("/",  $inputs['birthDate']);
            $inputs['birthDate'] = $year.'-'.$month.'-'.$day;}
        $patient->birthDate =  $inputs['birthDate'];
        $patient->address = $inputs['address'];
        $patient->password =bcrypt( $inputs['password']);
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








        return redirect()->route('backoffice.admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id)
            ->delete();
        return redirect()->route('backoffice.admin.patients.index');
    }
}
