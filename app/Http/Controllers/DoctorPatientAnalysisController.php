<?php

namespace App\Http\Controllers;

use App\AnalysePredef;
use App\Indicator;
use App\Patient;
use App\PatientAnalyseHasIndicator;
use App\PatientHasAnalyse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\AnalysePredefHasIndicator;
use App\Establishment;
use App\Type;
use ValidatesRequests;

class DoctorPatientAnalysisController extends Controller
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
        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        if(isset($_GET) && empty($_GET)){
            $date= date('Y-m-d', time());
        }
        else {
            $date = $_GET['date'];
        }



        $phas = DB::table('patient_has_analyse')
            ->join('establishment', 'establishment.id', '=', 'patient_has_analyse.labo_id')
            //   ->join('users', 'users.id', '=', 'patient_has_analyse.doctor_id')
            ->join('patients', 'patients.id', '=', 'patient_has_analyse.patient_id')
             ->where('doctor_id', '=', $id)
            ->orderBy('demandDate', 'desc')
            ->select( 'patient_has_analyse.*', 'establishment.nameE as labo', 'patients.name as patient')
            ->get();

        /*   echo '<pre>';
           print_r($phas);
           exit();
   */
        foreach($phas as $pha){
            if($pha->establishment_id == 0){
                $pha->estb = 'pas dans le système';
            }
            else{
                $ides = $pha->establishment_id;
                $n = Establishment::find($ides);
                $pha->estb = $n->nameE;
            }
        }

        foreach($phas as $pha){
            if($pha->doctor_id == 0){
                $pha->doctor = 'pas dans le système';
            }
            else{
                $ides = $pha->doctor_id;
                $n = User::find($ides);
                $pha->doctor = $n->name;
            }
        }


        /*   echo  '<pre>';
           print_r($phas);
           exit();*/

        foreach($phas as $pha){
            $id = $pha->id;

            $inds = DB::table('patient_analyse_has_indicator')
                ->join('indicators', 'indicators.id', '=', 'patient_analyse_has_indicator.indicator_id')
                ->join('patient_has_analyse', 'patient_has_analyse.id', '=', 'patient_analyse_has_indicator.pha_id')
                ->where('patient_has_analyse.id', '=', $id)
                ->select( 'indicators.*')
                ->get();
            $pha->inds = $inds;

        }


        return view('backoffice.doctor.patientAnalysis.index')->with('phas', $phas)
            ->with('date', $date)
            ->with('establishment', $establishment)
            ->with('type', $type);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id= Auth::id();
        $user = User::find($id);
        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $patients = DB::table('patients')
            ->join('rdv', 'rdv.patient_id', '=', 'patients.id')
            ->where('rdv.user_id', '=', $id)
            ->select( 'patients.*')
            ->get();

        /* echo '<pre>';
         print_r($users);
         exit();*/
        $date = date('Y-m-d', time());


        $anpre = AnalysePredef::all();


        foreach($anpre as $an) {
            $id = $an->id;

            $inds = DB::table('analyses_predef')
                ->join('analyse_predef_has_indicator', 'analyse_predef_has_indicator.analyse_predef_id', '=', 'analyses_predef.id')
                ->join('indicators', 'indicators.id', '=', 'analyse_predef_has_indicator.indicator_id')
                ->where('analyses_predef.id', '=', $id)
                ->select('indicators.*')
                ->get();
            //->toSql();

            /*   echo '<pre>';
               print_r($inds);

               exit();*/
            $an->inds = $inds;
        }

        /* echo '<pre>';
         print_r($anpre);
         exit();*/

        $indic = array();

        $indicators = Indicator::all();
        $ests =  DB::table('establishment')
            ->join('types', 'establishment.type_id', '=', 'types.id')
            ->where('types.titre', 'LIKE', '%labo%')
            ->select('establishment.*')
            ->get();
        return view('backoffice.doctor.patientAnalysis.create')->with('establishment', $establishment)
            ->with('patients', $patients)
           // ->with('users', $users)
            ->with('date', $date)
            ->with('anpre', $anpre)
            ->with('indicators', $indicators)
            ->with('indic', $indic)
            ->with('type', $type)
            ->with('ests', $ests)
            ->with('user', $user);
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

        if(strstr($inputs['demandDate'], "/")) {
            list($month, $day, $year)    = explode("/", $inputs['demandDate']);
            $inputs['demandDate'] = $year . '-' . $month . '-' . $day;
        }


        /*    echo '<pre>';
        print_r($inputs);
        exit();*/

        $indics = $inputs['indic'];
        $indics = array_unique($indics);
        unset($inputs['indic']);
        // unset($inputs['establishment_id']);
        $inputs['demandDate'] = $inputs['demandDate'];
        //unset($inputs['demandDate']);
        $inputs['doctor_id'] = $inputs['user_id'];
        unset($inputs['user_id']);
        unset($inputs['analysepred_id']);
        unset($inputs['other_inds']);
        /*      echo '<pre>';
              print_r($inputs);
              exit();
      */
        $pha =  PatientHasAnalyse::create([
            'labo_id' => $inputs['labo_id'],
            'name' => $inputs['name'],
            'demandDate' => $inputs['demandDate'],
            'establishment_id' => $inputs['establishment_id'],
            'doctor_id' => $inputs['doctor_id'],
            'patient_id' => $inputs['patient_id'],

        ]);
        /*  echo '<pre>';
          print_r($pha);
          exit();*/

        foreach($indics as $indic){
            /*  echo '<pre>';
              print_r($indic);
              exit();
            */
            $indice = Indicator::find($indic);
            PatientAnalyseHasIndicator::create([
                'pha_id' => $pha->getKey(),
                'indicator_id' => $indic,
                //'result' => Null
            ]);
        }


        return redirect()->action('DoctorPatientAnalysisController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pha = PatientHasAnalyse::find($id);

        if($pha->establishment_id == 0){
            $pha->estb = 'pas dans le système';
        }
        else{
            $ides = $pha->establishment_id;
            $n = Establishment::find($ides);
            $pha->estb = $n->nameE;
        }

        if($pha->doctor_id == 0){
            $pha->doctor = 'pas dans le système';
        }
        else{
            $ides = $pha->doctor_id;
            $n = User::find($ides);
            $pha->doctor = $n->name;
        }

        $p = Patient::find($pha->patient_id);
        $pha->patient = $p->name;

        $l = Establishment::find($pha->labo_id);
        $pha->labo = $l->nameE;

        $inds = DB::table('patient_analyse_has_indicator')
            ->join('indicators', 'indicators.id', '=', 'patient_analyse_has_indicator.indicator_id')
            ->join('patient_has_analyse', 'patient_has_analyse.id', '=', 'patient_analyse_has_indicator.pha_id')
            ->where('patient_has_analyse.id', '=', $id)
            ->select( 'indicators.name')
            ->get();
        $pha->inds = $inds;

        /*   echo '<pre>';
           print_r($pha);
           exit();*/

        $date = date('Y-m-d', time());

        return view('backoffice.doctor.patientAnalysis.show')
            ->with('pha', $pha)
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
        $pha = PatientHasAnalyse::find($id);
        if($pha->establishment_id == 0){
            $pha->estb = 'pas dans le système';
        }
        else{
            $ides = $pha->establishment_id;
            $n = Establishment::find($ides);
            $pha->estb = $n->nameE;
        }

        if($pha->doctor_id == 0){
            $pha->doctor = 'pas dans le système';
        }
        else{
            $ides = $pha->doctor_id;
            $n = User::find($ides);
            $pha->doctor = $n->name;
        }

        $p = Patient::find($pha->patient_id);
        $pha->patient = $p->name;

        $l = Establishment::find($pha->labo_id);
        $pha->labo = $l->nameE;
        $inds = DB::table('patient_analyse_has_indicator')
            ->join('indicators', 'indicators.id', '=', 'patient_analyse_has_indicator.indicator_id')
            ->join('patient_has_analyse', 'patient_has_analyse.id', '=', 'patient_analyse_has_indicator.pha_id')
            ->where('patient_has_analyse.id', '=', $id)
            ->select( 'indicators.*')
            ->get();
        $pha->inds = $inds;


        $date = date('Y-m-d', time());

        $id= Auth::id();
        $user = User::find($id);
        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $patients = DB::table('patients')
            ->join('rdv', 'rdv.patient_id', '=', 'patients.id')
            ->where('rdv.user_id', '=', $id)
            ->select( 'patients.*')
            ->get();
  /*      $users  = DB::table('users')
            ->join('establishment', 'users.establishment_id', '=', 'establishment.id')
            ->where('establishment.id', '=', $ide)
            ->where('users.role', '=', '20')
            ->select( 'users.*')
            ->get();
*/
        $ests =  DB::table('establishment')
            ->join('types', 'establishment.type_id', '=', 'types.id')
            ->where('types.titre', 'LIKE', '%labo%')
            ->select('establishment.*')
            ->get();
        $indicators = Indicator::all();

        return view('backoffice.doctor.patientAnalysis.edit')
            ->with('pha', $pha)
            ->with('date', $date)
            ->with('type', $type)
         //   ->with('users', $users)
            ->with('patients', $patients)
            ->with('establishment', $establishment)
            ->with('ests', $ests)
            ->with('indicators', $indicators)
            ->with('user', $user);
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
        $pha = PatientHasAnalyse::find($id);
        $inputs = $request->all();
        /*  echo '<pre>';
          print_r($inputs);
          exit();
        */

        $pha->name = $request->name;
        if(strstr($inputs['demandDate'], "/")) {
            list($month, $day, $year)    = explode("/", $inputs['demandDate']);
            $pha->demandDate = $year . '-' . $month . '-' . $day;
        }
      /*  if($request->doctor_id <> -1 ){
            $pha->doctor_id = $request->doctor_id;
        }*/
        if($request->patient_id <> -1 ){
            $pha->patient_id = $request->patient_id;
        }
        if($request->labo_id <> -1 ){
            $pha->labo_id = $request->labo_id;
        }
        if($request->establishment_id <> -1 ){
            $pha->establishment_id = $request->establishment_id;
        }

        if(isset($inputs['indic']) && !empty($inputs['indic'])){

            $indics = $inputs['indic'];
            $indics = array_unique($indics);
            unset($inputs['indic']);

            $pha->save();
            // DB::table('user_has_establishment')->where('establishment_id', '=', $establishment->id)->delete();
            DB::table('patient_analyse_has_indicator')->where('pha_id', '=', $pha->id)->delete();

            foreach($indics as $i){

                // echo $selectValue."<br>";
                PatientAnalyseHasIndicator::create([
                    'pha_id' => $pha->id,
                    'indicator_id' => $i
                ]);
            }
        }
        else{
            unset($inputs['indic']);
            $pha->save();
        }

        return redirect()->route('backoffice.doctor.patientAnalysis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pha = PatientHasAnalyse::find($id)
            ->delete();

        return redirect()->route('backoffice.doctor.patientAnalysis.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createRes($id)
    {
        $pha = PatientHasAnalyse::find($id);

        $inds = DB::table('patient_analyse_has_indicator')
            ->join('indicators', 'indicators.id', '=', 'patient_analyse_has_indicator.indicator_id')
            ->join('patient_has_analyse', 'patient_has_analyse.id', '=', 'patient_analyse_has_indicator.pha_id')
            ->where('patient_has_analyse.id', '=', $id)
            ->select( 'indicators.*')
            ->get();
        $pha->inds = $inds;

        $id= Auth::id();
        $user = User::find($id);
        $ide = $user->establishment_id;

        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);

        $date = date('Y-m-d', time());

        // $indic = array();



        /*   echo '<pre>';
           print_r($pha);
           exit();
   */
        return view('backoffice.doctor.patientAnalysis.createRes')->with('establishment', $establishment)
            //  ->with('indic', $indic)
            ->with('type', $type)
            ->with('date', $date)
            ->with('pha', $pha);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeRes(Request $request, $id)
    {
        $pha = PatientHasAnalyse::find($id);

        $inputs = $request->all();

        /*  echo '<pre>';
          print_r($inputs);
          exit();
        */

        $inds = DB::table('patient_analyse_has_indicator')
            ->join('indicators', 'indicators.id', '=', 'patient_analyse_has_indicator.indicator_id')
            ->join('patient_has_analyse', 'patient_has_analyse.id', '=', 'patient_analyse_has_indicator.pha_id')
            ->where('patient_has_analyse.id', '=', $id)
            ->select( 'patient_analyse_has_indicator.*')
            ->get();
        //  $pha->inds = $inds;
        if(strstr($inputs['resultDate'], "/")) {
            list($month, $day, $year)    = explode("/", $inputs['resultDate']);
            $pha->resultDate = $year . '-' . $month . '-' . $day;
        }
        else {
            $pha->resultDate = $inputs['resultDate'];
        }
        $result = array_unique($inputs['result']);
        // $result    = ;
        $pha->save();
        $j = 0;
        foreach($inds as $ind){

            if($j < count($result)){
                $phaInd = PatientAnalyseHasIndicator::find($ind->id);


                $phaInd->result = array_values($result)[$j];
                $phaInd->save();
                $j++;


            }}

        return redirect()->route('backoffice.doctor.patientAnalysis.index');
        /// mettre le resultat dans inds et puis save

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewRes($id)
    {
        $pha = PatientHasAnalyse::find($id);


        if($pha->establishment_id == 0){
            $pha->estb = 'pas dans le système';
        }
        else{
            $ides = $pha->establishment_id;
            $n = Establishment::find($ides);
            $pha->estb = $n->nameE;
        }

        if($pha->doctor_id == 0){
            $pha->doctor = 'pas dans le système';
        }
        else{
            $ides = $pha->doctor_id;
            $n = User::find($ides);
            $pha->doctor = $n->name;
        }

        $p = Patient::find($pha->patient_id);
        $pha->patient = $p->name;
        $pha->cin = $p->cin;

        $l = Establishment::find($pha->labo_id);
        $pha->labo = $l->nameE;
        $inds = DB::table('patient_analyse_has_indicator')
            ->join('indicators', 'indicators.id', '=', 'patient_analyse_has_indicator.indicator_id')
            ->join('patient_has_analyse', 'patient_has_analyse.id', '=', 'patient_analyse_has_indicator.pha_id')
            ->where('patient_has_analyse.id', '=', $id)
            ->select( 'indicators.*', 'patient_analyse_has_indicator.*')
            ->get();
        $pha->inds = $inds;

        $id= Auth::id();
        $user = User::find($id);
        $ide = $user->establishment_id;

        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);

        $date = date('Y-m-d', time());

        // $indic = array();



        /*   echo '<pre>';
           print_r($pha);
           exit();
   */
        return view('backoffice.doctor.patientAnalysis.viewRes')->with('establishment', $establishment)
            //  ->with('indic', $indic)
            ->with('type', $type)
            ->with('date', $date)
            ->with('pha', $pha);
    }
}
