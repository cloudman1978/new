<?php

namespace App\Http\Controllers\Auth;

function loadUrl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

use App\Establishment;
use App\User;
use App\Speciality;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    

    protected $redirectPath = '/backoffice/dashboard';

    protected $loginPath = 'backoffice/auth/login';

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'tel' => 'required',
            'role' => 'required',
            'gradeHonor' => 'max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        /*
         *
         *      if(isset($data['establishment_id']) && !empty($data['establishment_id'])){

            $establishments = $data['establishment_id'];
            unset($data['establishment_id']);

            foreach($establishments as $estab){
                UserHasEstablishment::create([
                    'establishment_id' => $estab,
                    'user_id' => $user->getKey()
                ]);
            }
        }
        else{
            unset($data['establishment_id']);

        }
         *
         */
        if($data['role'] == 10){
            $data['establishment_id'] = 1;
            $data['speciality_id'] =1;}

        if(!empty($data['image'])) {
            $file = array('image' => Input::file('image'));

            // checking file is valid.
            // if (Input::file('image')->isValid()) {
            $destinationPath = 'users'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = str_random(4) . '-' . $data['name'] . '.' . $extension; // renameing image
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            Session::flash('success', 'Upload successfully');


            return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tel' => $data['tel'],
            'role' => $data['role'],
            'gradeHonor' => $data['gradeHonor'],
            'speciality_id' => $data['speciality'],
                'establishment_id' => $data['establishment_id'],
            'image' => $fileName,
            
        ]);}
        else {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'tel' => $data['tel'],
                'role' => $data['role'],
                'gradeHonor' => $data['gradeHonor'],
                'speciality_id' => $data['speciality'],
                'establishment_id' => $data['establishment_id'],

            ]);
        }
    }
    public function getRegister(){

    $specialities = Speciality ::all();
        $establishments = Establishment::all();
    return view('backoffice.auth.register')
        ->with('establishments', $establishments)
        ->with('specialities', $specialities);
    }
    public function getLogin(){
        return view('backoffice.auth.login');
    }
   /* public function getLogout(){
        return view('backoffice.auth.register')
    }*/
    public function getLogout()
    {
       Auth::logout();
        //return view('backoffice.welcome');
        return redirect('backoffice');

    }

    public function authenticated(){
        $id= Auth::id();
        $user = User::find($id);
        if($user->role == "10"){
            return redirect('backoffice/admin');
        }
        else if($user->role == "30"){
            return redirect('backoffice/secretary');
        }
        else if($user->role == "20"){
            return redirect('backoffice/doctor');
        }
        return redirect('/backoffice');
    }
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

        $id=Auth::id();

       $user = User::find($id);

        if($user->role == '10') {
            return redirect('backoffice/admin');
        }
        else if($user->role == '30') {
            return redirect('backoffice/secretary');
        }
        else if($user->role == "20"){
            return redirect('backoffice/doctor');
        }
        return redirect('/backoffice');

      //return redirect('/backoffice');
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $result = loadUrl("http://bulksms.l-2t.com/Api/Api.aspx?fct=sms&key=/-/C14ZwJAfiauwNNJ4fP0AZ4mPITSDf2JM9fW3IiNOg7Xayci2FtGgPEVjdj0TR5VswgJbw1G/-/pDV7m/-/Q3rcqWg==&mobile=21643221426&sms=authentication&sender=mondocteur.ovh");
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }





        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                $this->loginUsername() =>'Ces informations ne correspondent pas à nos données.',
            ]);
    }


}
