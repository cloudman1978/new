<?php

namespace App\Http\Controllers;
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
use App\Gouvernerate;
use App\Speciality;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = loadUrl("http://bulksms.l-2t.com/Api/Api.aspx?fct=sms&key=/-/C14ZwJAfiauwNNJ4fP0AZ4mPITSDf2JM9fW3IiNOg7Xayci2FtGgPEVjdj0TR5VswgJbw1G/-/pDV7m/-/Q3rcqWg==&mobile=216531689546&sms=authentication&sender=mondocteur.ovh");
        mail ( 'adelessafi@gmail.com' , 'Notification de connexion' ,'Une nouvelle connexion s est effectuee sur le site' );

        $specialities = Speciality ::all();
       // $gouvernerates = Gouvernerate ::all();
        return view('welcome')
            ->with('specialities', $specialities);
          //  ->with('gouvernerates', $gouvernerates);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $specialities = Speciality ::all();
        // $gouvernerates = Gouvernerate ::all();
        return view('contact')
            ->with('specialities', $specialities);
        //  ->with('gouvernerates', $gouvernerates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
