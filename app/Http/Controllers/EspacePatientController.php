<?php

namespace App\Http\Controllers;

use App\Insurance;
use App\Patient;
use App\Rdv;
use App\Speciality;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Validator;
use App\InsuranceHasPatient;

class EspacePatientController extends Controller
{
    /**
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request,Session $session)
    {
      //$p =  dd(Session::all());
     //   echo "<pre>";
     //   $patient = $session::get('patient');
     $patient=  Cookie::get('patient');
     //   $session = Session::all();
      /*  if(!isset($session["patient2"])) Session::put('patient2',time());
        print_r(Session::all());
        exit();*/
    /*  echo '<pre>';
        $data = $request->session()->all();
        var_dump($data);
        print_r($patient['name']);
        exit();*/
/*
        echo '<pre>';
        print_r($patient);
        exit();*/
        $patient = Patient::find($patient->id);

        $specialities = Speciality::all();
        $insurances = DB::table('insurances')
            ->join('insurance_has_patient', 'insurances.id', '=', 'insurance_has_patient.insurance_id')
            ->join('patients', 'patients.id', '=', 'insurance_has_patient.patient_id')
            ->select('insurances.*', 'insurance_has_patient.affiliation')
            ->where('insurance_has_patient.patient_id', '=', $patient->id)
            ->get();
        $inss = Insurance::all();


        $doctors =DB::table('patients')
            ->join('rdv', 'rdv.patient_id', '=', 'patients.id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->where('patients.id', $patient->id)
            ->select( 'users.*', 'specialities.intituleProf', 'establishment.address')
            ->get();

        return view('patient.index')
            ->with('patient',  $patient)
           ->with('doctors', $doctors)
            ->with('specialities', $specialities)
            ->with('insurances', $insurances)
            ->with('inss', $inss);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctors(Request $request,Session $session)
    {
        //$p =  dd(Session::all());
        //   echo "<pre>";
        //   $patient = $session::get('patient');
        $patient=  Cookie::get('patient');
        //   $session = Session::all();
        /*  if(!isset($session["patient2"])) Session::put('patient2',time());
          print_r(Session::all());
          exit();*/
        /*  echo '<pre>';
            $data = $request->session()->all();
            var_dump($data);
            print_r($patient['name']);
            exit();*/
        /*
                echo '<pre>';
                print_r($patient);
                exit();*/
        $patient = Patient::find($patient->id);

        $specialities = Speciality::all();
    //    $insurances = Insurance::all();

        $doctors =DB::table('patients')
            ->join('rdv', 'rdv.patient_id', '=', 'patients.id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->where('patients.id', $patient->id)
            ->select( 'users.*', 'specialities.intituleProf', 'establishment.address', 'establishment.nameE')
            ->distinct()
            ->get();
        $jours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Venderdi', 'Samedi');
        $mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
            'Novembre', 'Décembre');

            foreach($doctors as $d){
                $lastRdv = DB::table('rdv')->where('rdv.user_id', '=', $d->id)
                    ->orderBy('hour', 'desc')
                    ->select('rdv.*')
                    ->first();
                   // ->get();

             /*   echo '<pre>';
                print_r($lastRdv);
                exit();
*/
                $ddd = strtotime($lastRdv->hour);
                $j = date('N', $ddd);

              /*  echo '<pre>';
                print_r($j);
                exit();*/

                $jour = $jours[$j-1];
                $m = date('m', $ddd);

                if($m <10)
                    $m = $m % 10;

            /*    echo '<pre>';
                print_r($m);
                exit();
*/
                $moi = $mois[$m];
                $y = date('Y', $ddd);
                $a = date('A', $ddd);
                $num = date('d', $ddd);
                $heur = date('h:i', $ddd);

               $d->hour = 'Le '.$jour.' '.$num.' '.$moi.' '.$y.' à '.$heur.' '.$a;
               // $d->hour = date('d:m:Y', $ddd);
            }

        return view('patient.doctors')
            ->with('patient',  $patient)
            ->with('doctors', $doctors)
            ->with('specialities', $specialities);
         //   ->with('insurances', $insurances);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rdvList(Session $session)
    {

        $patient=  Cookie::get('patient');
        $patient = Patient::find($patient->id);
        //   $session = Session::all();
        /*  if(!isset($session["patient2"])) Session::put('patient2',time());
          print_r(Session::all());
          exit();*/
        /*  echo '<pre>';
            $data = $request->session()->all();
            var_dump($data);
            print_r($patient['name']);
            exit();*/

        $rdvs =DB::table('rdv')
            ->join('patients', 'rdv.patient_id', '=', 'patients.id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('patients.id', $patient->id)
            ->select( 'rdv.*', 'establishment.nameE', 'users.name as nameU', 'establishment.logo'
                , 'establishment.address', 'specialities.intituleProf', 'patients.name as nameP', 'users.id as idUE')
            ->get();

        $jours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Venderdi', 'Samedi');
        $mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
            'Novembre', 'Décembre');

        foreach($rdvs as $d){
            $ddd = strtotime($d->hour);
            $j = date('N', $ddd);
            $jour = $jours[$j-1];
            $m = date('m', $ddd);

            if($m <10)
                $m = $m % 10;
            $moi = $mois[$m-1];
            $y = date('Y', $ddd);
            $a = date('A', $ddd);
            $num = date('d', $ddd);
            $heur = date('h:i', $ddd);

            $d->textH = 'Le '.$jour.' '.$num.' '.$moi.' '.$y.' à '.$heur.' '.$a;
        }

        $specialities = Speciality::all();

        return view('patient.RdvList')
            ->with('patient',  $patient)
            ->with('rdvs', $rdvs)
            ->with('specialities', $specialities);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consult(Session $session)
    {

        $patient=  Cookie::get('patient');
        $patient = Patient::find($patient->id);
        //   $session = Session::all();
        /*  if(!isset($session["patient2"])) Session::put('patient2',time());
          print_r(Session::all());
          exit();*/
        /*  echo '<pre>';
            $data = $request->session()->all();
            var_dump($data);
            print_r($patient['name']);
            exit();*/

        $rdvs =DB::table('rdv')
            ->join('patients', 'rdv.patient_id', '=', 'patients.id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('patients.id', $patient->id)
            ->select( 'rdv.*', 'establishment.nameE', 'users.name as nameU', 'establishment.logo'
                , 'establishment.address', 'specialities.intituleProf', 'patients.name as nameP')
            ->get();

        return view('patient.consultations')
            ->with('patient',  $patient)
            ->with('rdvs', $rdvs);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay(Session $session)
    {

        $patient=  Cookie::get('patient');
        $patient = Patient::find($patient->id);
        //   $session = Session::all();
        /*  if(!isset($session["patient2"])) Session::put('patient2',time());
          print_r(Session::all());
          exit();*/
        /*  echo '<pre>';
            $data = $request->session()->all();
            var_dump($data);
            print_r($patient['name']);
            exit();*/

        $rdvs =DB::table('rdv')
            ->join('patients', 'rdv.patient_id', '=', 'patients.id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->join('payment', 'payment.rdv_id', '=', 'rdv.id')
            ->where('patients.id', $patient->id)
            ->select( 'rdv.hour', 'rdv.state', 'establishment.nameE', 'users.name as nameU', 'establishment.logo'
                , 'establishment.address', 'specialities.intituleProf', 'patients.name as nameP', 'payment.*')
            ->get();
        $specialities = Speciality::all();

        $totAm = DB::table('payment')
            ->join('rdv', 'payment.rdv_id', '=', 'rdv.id' )
            ->join('patients', 'rdv.patient_id', '=', 'patients.id')
                ->where('patients.id', $patient->id)
            ->sum('amount');
        $jours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Venderdi', 'Samedi');
        $mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
            'Novembre', 'Décembre');


        foreach($rdvs as $d){
            $ddd = strtotime($d->date);
            $j = date('N', $ddd);
            $jour = $jours[$j-1];
            $m = date('m', $ddd);

            if($m <10)
                $m = $m % 10;
            $moi = $mois[$m];
            $y = date('Y', $ddd);
           // $a = date('A', $ddd);
            $num = date('d', $ddd);
         //   $heur = date('h:i', $ddd);

            $d->textH = 'Le '.$jour.' '.$num.' '.$moi.' '.$y;
        }


        return view('patient.payments')
            ->with('patient',  $patient)
            ->with('rdvs', $rdvs)
            ->with('specialities', $specialities)
            ->with('totAm', $totAm);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insure(Session $session)
    {

        $patient=  Cookie::get('patient');
        $patient = Patient::find($patient->id);
        //   $session = Session::all();
        /*  if(!isset($session["patient2"])) Session::put('patient2',time());
          print_r(Session::all());
          exit();*/
        /*  echo '<pre>';
            $data = $request->session()->all();
            var_dump($data);
            print_r($patient['name']);
            exit();*/

        $rdvs =DB::table('rdv')
            ->join('patients', 'rdv.patient_id', '=', 'patients.id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('patients.id', $patient->id)
            ->select( 'rdv.*', 'establishment.nameE', 'users.name as nameU', 'establishment.logo'
                , 'establishment.address', 'specialities.intituleProf', 'patients.name as nameP')
            ->get();

        return view('patient.insure')
            ->with('patient',  $patient)
            ->with('rdvs', $rdvs);
    }



    public function profile(Request $request,Session $session)
    {

        $patient=  Cookie::get('patient');
        $patient = Patient::find($patient->id);
        //   $session = Session::all();
        /*  if(!isset($session["patient2"])) Session::put('patient2',time());
          print_r(Session::all());
          exit();*/
        /*  echo '<pre>';
            $data = $request->session()->all();
            var_dump($data);
            print_r($patient['name']);
            exit();*/



        return view('patient.modifyProfile')
            ->with('patient',  $patient);
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

     /*   echo '<pre>';
        print_r($inputs);
        exit();
*/

        $validator=  Validator::make($inputs, [
            'height' => 'required|regex:/^\d*(\.\d{2})?$/',
            'size' =>   'required',
            'name' => 'required|max:255',
            'cin' => 'required|max:255',
            'gender' => 'required|max:255',
            'address' => 'required|max:255'
        ]);
        if($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $patient = Patient::find($id);
      //  echo '<pre>';
      //  print_r($patient->email);
     //   print_r($inputs);
     //   exit();
        $patient->name = $inputs['name'];
        $patient->cin = $inputs['cin'];
        $patient->email = $inputs['email'];
      //  $patient->password =bcrypt( $inputs['password']);
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


        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelRdv($id)
    {
        $patient=  Cookie::get('patient');
        $patient = Patient::find($patient->id);

        $rdv = Rdv::find($id);
        $specilaities = Speciality::all();


    /*    echo '<pre>';
        print_r($rdv);
        exit();
*/

        return view('patient.cancelRdv')->with('rdv', $rdv)
            ->with('specialities', $specilaities)
            ->with('patient', $patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rdv::find($id)
            ->delete();




        $patient=  Cookie::get('patient');
        $patient = Patient::find($patient->id);
        $rdvs =DB::table('rdv')
            ->join('patients', 'rdv.patient_id', '=', 'patients.id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->where('patients.id', $patient->id)
            ->select( 'rdv.*', 'establishment.nameE', 'users.name as nameU', 'establishment.logo'
                , 'establishment.address', 'specialities.intituleProf', 'patients.name as nameP', 'users.id as idUE')
            ->get();

        $jours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Venderdi', 'Samedi');
        $mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
            'Novembre', 'Décembre');

        foreach($rdvs as $d){
            $ddd = strtotime($d->hour);
            $j = date('N', $ddd);
            $jour = $jours[$j-1];
            $m = date('m', $ddd);

            if($m <10)
                $m = $m % 10;
            $moi = $mois[$m-1];
            $y = date('Y', $ddd);
            $a = date('A', $ddd);
            $num = date('d', $ddd);
            $heur = date('h:i', $ddd);

            $d->textH = 'Le '.$jour.' '.$num.' '.$moi.' '.$y.' à '.$heur.' '.$a;
        }

        $specialities = Speciality::all();

        return redirect()->route('patient.RdvList')->with('patient',  $patient)
            ->with('rdvs', $rdvs)
            ->with('specialities', $specialities);
    }



}
