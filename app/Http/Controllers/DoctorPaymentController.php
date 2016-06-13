<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Rdv;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Type;
use App\Establishment;

class DoctorPaymentController extends Controller
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
        $payments  = DB::table('payment')
            ->join('rdv', 'rdv.id', '=', 'payment.rdv_id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('patients', 'patients.id', '=', 'rdv.patient_id')
            ->select( 'payment.*', 'patients.name as patient', 'users.name as praticien')
            ->where('rdv.user_id', '=', $id)
            ->get();
        $date = date('Y-m-d', time());
        return view('backoffice.doctor.payment.index')
            ->with('payments', $payments)
            ->with('date', $date)
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
        /*   $us_has_est = DB::table('user_has_establishment')->where('user_id', '=', $user->id)->get();
           $est = $us_has_est[0]->establishment_id;
           $establishments = DB::table('establishment')
               ->where('establishment.id', $est)
               ->select( 'establishment.*')
               ->get();
        */
        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $rdvs  = DB::table('rdv')
            ->join('patients', 'rdv.patient_id', '=', 'patients.id')
            ->select( 'rdv.*', 'patients.name as patient')
            ->where('rdv.user_id', '=', $id)
            ->where('rdv.state', '<>', '30')
            ->get();
        $date = date('Y-m-d', time());
        return view('backoffice.doctor.payment.create')
            ->with('rdvs', $rdvs)
            ->with('date', $date)
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
        list($month, $day, $year)
            =explode("/",  $inputs['date']);
        $inputs['date'] = $year.'-'.$month.'-'.$day;

        $inputs['type'] = $inputs['cheq'];
        $inputs['cheq'] = $inputs['num2'];
        $inputs['other'] = $inputs['num3'];
        unset($inputs['num2']);
        unset($inputs['num3']);

        /*    echo '<pre>';
            print_r($inputs);
            exit();
    */
        Payment::create($inputs);

        $rdv = Rdv::find($inputs['rdv_id']);
        $rdv->state = 30;
        $rdv->save();
        $date = date('Y-m-d', time());

        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        return redirect()->action('DoctorPaymentController@index')
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
        $payment = Payment::find($id);
        $rdv = Rdv::find($payment->rdv_id);
        $patient = Patient::find($rdv->patient_id);
        $payment->nameP = $patient->name;
        $payment->hour = $rdv->hour;
        $date = date('Y-m-d', time());
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        return view('backoffice.doctor.payment.show')
            ->with('payment', $payment)
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
        $payment = Payment::find($id);
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $date = date('Y-m-d', time());
        $rdv = DB::table('rdv')
            ->join('establishment', 'establishment.id', '=', 'rdv.establishment_id')
            ->join('users', 'users.id', '=', 'rdv.user_id')
            ->join('patients', 'patients.id', '=', 'rdv.patient_id')
            ->where('rdv.user_id', '=', $id)
            ->where('rdv.id', '=', $payment->rdv_id)
            ->select( 'rdv.*', 'establishment.nameE', 'patients.name as nameP', 'users.name as nameU')
            ->first();

        return view('backoffice.doctor.payment.edit')
            ->with('payment', $payment)
            ->with('date', $date)
            ->with('rdv', $rdv)
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
        $payment = Payment::find($id);
        $payment->date = $request->date;
        $payment->amount = $request->amount;
        $payment->type = $request->cheq;
        $payment->cheq = $request->num2;
        $payment->other = $request->num3;
        $payment->rdv_id = $request->rdv_id;
        $payment->observations = $request->observations;
        $payment->save();
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $date = date('Y-m-d', time());
        return redirect()->route('backoffice.doctor.payment.index')
            ->with('type', $type)
            ->with('date',$date);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::find($id)
            ->delete();
        $id= Auth::id();
        $user = User::find($id);

        $ide = $user->establishment_id;
        $establishment = Establishment::find($ide);
        $type = Type::find($establishment->type_id);
        $date = date('Y-m-d', time());
        return redirect()->route('backoffice.doctor.payment.index')
            ->with('type', $type)
            ->with('date', $date);
    }
}
