<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Establishment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Speciality;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User ::all();
        //print_r($users);
       // exit();
         $users = DB::table('users')
             ->join('establishment', 'establishment.id', '=', 'users.establishment_id')
            ->join('specialities', 'specialities.id', '=', 'users.speciality_id')
            ->select('users.*', 'specialities.intituleProf', 'establishment.nameE')
            ->get();

     /*   foreach($users as $user){

            $id = $user->id;

            $establishments = DB::table('user_has_establishment')
                ->join('establishment', 'establishment.id', '=', 'user_has_establishment.establishment_id')
                ->join('users', 'users.id', '=', 'user_has_establishment.user_id')
                ->where('users.id', '=', $id)
                ->select( 'establishment.nameE')
                ->get();
            $user->establishments = $establishments;

        }*/
        return view('backoffice.admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $specialities = Speciality ::all();
        $establishments = Establishment::all();
         return view('backoffice.admin.user.create')
             ->with('specialities', $specialities)
             ->with('establishments', $establishments);
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
        $inputs['password'] = bcrypt($inputs['password']);

        //return $inputs;
       // print_r($inputs);
       // exit();


        if(!empty($inputs['image'])){
            $file = array('image' => Input::file('image'));

            // checking file is valid.
            // if (Input::file('image')->isValid()) {
            $destinationPath = 'users'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = str_random(4).$request->name.'.'.$extension; // renameing image
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            Session::flash('success', 'Upload successfully');


            $inputs['image'] = $fileName;}
        else{
            $inputs['image'] = "";
        }



        if($inputs['role'] == 10){
            $inputs['establishment_id'] = 1;
        $inputs['speciality_id'] =1;}

            $user = User::create([
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'password' => bcrypt($inputs['password']),
                'tel' => $inputs['tel'],
                'role' => $inputs['role'],
                'gradeHonor' => $inputs['gradeHonor'],
                'speciality_id' => $inputs['speciality_id'],
                'establishment_id' => $inputs['establishment_id'],
                'image' => $inputs['image'],
            ]);







        //return redirect()->route('product.index');
        return redirect()->action('AdminUserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //print_r($user);
        //exit();
        $est = Establishment::find($user->establishment_id);
        $user->nameE = $est->nameE;
         $speciality = Speciality::find($user->speciality_id);
/*
        $estabs = DB::table('user_has_establishment')
            ->join('users', 'users.id', '=', 'user_has_establishment.user_id')
            ->join('establishment', 'establishment.id', '=', 'user_has_establishment.establishment_id')
            ->select('establishment.nameE')
            ->where('user_has_establishment.user_id', '=', $id)
            ->get();
*/
        return view('backoffice.admin.user.show')->with('user', $user)
                                      ->with('speciality', $speciality);
                                       // ->with('estabs', $estabs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);
          $specialities = Speciality ::all();
        $establishments = Establishment::all();

        //$product = Product::where('id', $id)->first();
        return view('backoffice.admin.user.edit', compact('user', $user))
            ->with('specialities', $specialities)
            ->with('establishments', $establishments);
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
        $user = User::find($id);
        $inputs = $request->all();
        $user->name = $inputs['name'];
        $user->tel = $inputs['tel'];
        $user->gradeHonor = $inputs['gradeHonor'];
        $user->email = $inputs['email'];
        $user->speciality_id = $inputs['speciality_id'];
        $user->role = $inputs['role'];
        $user->password =bcrypt( $inputs['password']);
        if(!empty($inputs['image'])){
            $file = array('image' => Input::file('image'));

            // checking file is valid.
            // if (Input::file('image')->isValid()) {
            $destinationPath = 'users'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = str_random(4).'-'.$request->name.'.'.$extension; // renameing image
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            Session::flash('success', 'Upload successfully');


            $user->image = $fileName;}
        else {
            $user->image = $inputs['imgInitial'];
            unset( $inputs['imgInitial']);
        }


        if($inputs['role'] == 10){
            $user->establishment_id = 1;
            $user->speciality_id =1;}


            $user->save();


        return redirect()->route('backoffice.admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::find($id)
            ->delete();
        return redirect()->route('backoffice.admin.user.index');
    }
}
