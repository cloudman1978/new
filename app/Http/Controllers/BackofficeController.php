<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackofficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('back');

    }
    public function index(){
        if (Auth::check()){
            return view('backoffice.welcome');

        }
        else return view('backoffice.auth.login');
    }
}
