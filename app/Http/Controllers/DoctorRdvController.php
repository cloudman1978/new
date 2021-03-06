<?php

namespace App\Http\Controllers;
use App\Establishment;
use App\Patient;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rdv;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\Payment;
class DoctorRdvController extends Controller
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



        $rdvs = DB::table('rdv')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('patients', 'patients.id', '=', 'rdv.patient_id')
           // ->join('payment', 'payment.rdv_id', '=', 'rdv.id')
            ->where('rdv.user_id', '=', $user->id)
            ->where('rdv.date', '=', $date)
            ->select( 'rdv.*', 'establishment.nameE', 'patients.name as nameP', 'users.name as nameU'
                //, 'payment.amount')
            );


      /*  echo '<pre>';
        print_r($rdvs);
        exit();
*/

    //    $amount = $rdvs->avg('payment.amount');


         $rdvs= $rdvs->get();

        return view('backoffice.doctor.rdv.index')->with('rdvs', $rdvs)
            ->with('date', $date)
            ->with('establishment', $establishment)
            ->with('type', $type);
       //     ->with('amount', $amount);

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
            ->distinct()
            ->get();
        $date = date('Y-m-d', time());
        return view('backoffice.doctor.rdv.create')->with('establishment', $establishment)
            ->with('patients', $patients)
            ->with('date', $date)
            ->with('user', $user)
            ->with('type', $type);
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
        list($date, $hour)=explode(" ", $inputs['hour']);
        list($month, $day, $year)
            =explode("/",  $date);
        $inputs['date'] = $year.'-'.$month.'-'.$day;
        $inputs['hour'] =$inputs['date'].' '.$hour.':00';
        /*   print_r($inputs);
           exit();
        */
        $rdv = Rdv::create($inputs);
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        return redirect()->action('DoctorRdvController@index')
            ->with('date', $date)
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
        $rdv = DB::table('rdv')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('patients', 'patients.id', '=', 'rdv.patient_id')
            ->where('rdv.id', '=', $id)
            ->select( 'rdv.*', 'establishment.nameE', 'patients.name as nameP', 'users.name as nameU')
            ->first();
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);

        return view('backoffice.doctor.rdv.show')
            ->with('rdv', $rdv)
            ->with('date', $date)
            ->with('type', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rdv = Rdv::find($id);
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);

        $date = date('Y-m-d', time());

        $patients = DB::table('patients')
            ->join('rdv', 'rdv.patient_id', '=', 'patients.id')
            ->where('rdv.user_id', '=', $id)
            ->select( 'patients.*')
            ->distinct()
            ->get();
        return view('backoffice.doctor.rdv.edit')
            ->with('rdv', $rdv)
            ->with('establishment', $establishment)
            ->with('patients', $patients)
            ->with('user', $user)
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
        $rdv = Rdv::find($id);
        $rdv->rqs = $request->rqs;
        $rdv->state = $request->state;
        $rdv->establishment_id = $request->establishment_id;
        $rdv->user_id = $request->user_id;
        $rdv->patient_id = $request->patient_id;
        if(strstr($request->hour, "/")){
            list($date, $hour)=explode(" ", $request->hour);
            list($month, $day, $year)
                =explode("/",  $date);
            $rdv->date = $year.'-'.$month.'-'.$day;
            $rdv->hour =$rdv->date.' '.$hour.':00';
        }
        $rdv->save();
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);

        return redirect()->route('backoffice.doctor.rdv.index')
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
        $rdv = Rdv::find($id)
            ->delete();
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        return redirect()->route('backoffice.doctor.rdv.index')
            ->with('date', $date)
            ->with('type', $type);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        $inputs = $request->all();
        $rdv = Rdv::find($inputs['rdv_id']);
        list($month, $day, $year)
            =explode("/",  $inputs['date']);
        $inputs['date'] = $year.'-'.$month.'-'.$day;

        $inputs['type'] = $inputs['cheq'];
        $inputs['cheq'] = $inputs['num2'];
        $inputs['other'] = $inputs['num3'];
        unset($inputs['num2']);
        unset($inputs['num3']);

        Payment::create($inputs);
        $rdv->state= "30";
        $rdv->save();
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        return redirect()->action('DoctorRdvController@index')
            ->with('date', $date)
            ->with('type', $type);

    }

}
