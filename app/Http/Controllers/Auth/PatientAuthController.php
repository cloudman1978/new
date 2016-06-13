<?php

namespace App\Http\Controllers\Auth;

use App\Insurance;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use Validator;
use Crypt;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use App\InsuranceHasPatient;


class PatientAuthController extends Controller
{
    protected $redirectPath = '/patient';

    protected $loginPath = 'auth/login';

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new patients, as well as the
    | authentication of existing patients. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'cin' => 'required|max:255|unique:patients',
            'email' => 'required|email|max:255|unique:patients',
            'password' => 'required|confirmed|min:6',
            'tel' => 'required',
            'birthDate' => 'date|before:2000-01-01|after:1959-12-31',
            'gender' => 'required|max:255',
            'address' => 'max:255',
            'height' => 'regex:/^\d*(\.\d{2})?$/',

        ]);
    }

    /**
     * Create a new patient instance after a valid registration.
     *
     * @param  array  $data
     * @return Patient
     */
    protected function create(array $data)
    {
        list($month, $day, $year)
            =explode("/",  $data['birthDate']);
        $data['birthDate'] = $year.'-'.$month.'-'.$day;
            return Patient::create([
                'name' => $data['name'],
                'cin' => $data['cin'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'tel' => $data['tel'],
                'birthDate' => $data['birthDate'],
                'gender' => $data['gender'],
                'address' =>$data['address'],
                'height' => $data['height'],
                'size' => $data['size'],

            ]);}

    public function getLogin(){
        return view('auth.login');
    }
    public function getLogout(Request $request){
        $request->session()->flush();
        return redirect('auth/login');
    }
    public function getRegister(){
        $insurances = Insurance::all();
        return view('auth.register')
            ->with('insurances', $insurances);
    }
    public function postRegister(Request $request){
        $inputs = $request->all();

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
        if ($this->validator($inputs)){
           $patient= $this->create($inputs);
            foreach($insurances as $ins){


                InsuranceHasPatient::create([
                    'insurance_id' => $ins['insurance_id'],
                    'affiliation' => $ins['affiliation'],
                    'patient_id' => $patient->getKey()
                ]);
            }

            $request->session()->push('patient', $patient);
            Cookie::queue('patient', $patient);
            return redirect('/patient');
        }
    }
    public function postLogin(Request $request){
        $rules = array(
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('auth/login')->withErrors($validator);
        }
        else{
        $inputs = $request->all();
       /* print_r($inputs);
        exit();*/
        $mail = $inputs['email'];
        $pass = $inputs['password'];
            $dec=     Hash::make($pass);

         $patient = DB::table('patients')
            ->where('email', 'like', $mail)
           // ->where('password', '=', $dec)
            ->first();
            if(Hash::check($pass, $patient->password)){
               /* echo 'aaaaa <pre>';
                print_r($patient);
                exit();*/

               // $request->session()->push('patient', $patient);
                Session::set('patient', $patient);
                Session::save();
                Cookie::queue('patient', $patient);
                $request->session()->save();

                return redirect('/patient')->with('patient', $patient);
            }
            else{
                return Redirect::to('auth/login')->withErrors('mot de passe ou email  non valides');
            }
       // $user = DB::table('users')->where('name', 'John')
        /*    if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                $patient = Auth::user();
                echo '<pre>';
                print_r($patient);
                exit();
            }*/

         //   if (Hash::check('plain-text', $hashedPassword))

      /*  if (isset($patient) && !empty($patient)){
           // $pat = serialize($patient);
          //  $idd = strval($patient->id);
            print_r($patient);

            $request->session()->push('patient', 'Bienvenue'.$patient->pseudo);
            print_r($patient->pseudo);
            return redirect('/');

        }}*/
      /*  else {   return redirect('auth/login')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                 'Ces informations ne correspondent pas à nos données.',
            ]);}
*/



        //$value = $request->session()->get('key', 'default');
    }}

}
