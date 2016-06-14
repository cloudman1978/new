<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*  backoffice    */
Route::group(['middleware' => 'admin'], function () {
    Route::get('backoffice/admin', function ()    {
        return view('backoffice.admin.dashboard');
    });


    Route::resource('backoffice/admin/establishment', 'AdminEstablishmentController');
    Route::resource('backoffice/admin/specialite', 'AdminSpecialitiesController');
    Route::resource('backoffice/admin/type', 'AdminTypeController');
    Route::resource('backoffice/admin/user', 'AdminUserController');
    Route::resource('backoffice/admin/patients', 'AdminPatientController');
    Route::resource('backoffice/admin/indicators', 'AdminIndicatorController');
    Route::resource('backoffice/admin/analysepredef', 'AdminAnalysePredefController');

});

Route::group(['middleware' => 'back'], function () {
    Route::get('backoffice/', function ()    {
        return view('backoffice.welcome');
    });
    Route::get('backoffice/dashboard', function ()    {
        return view('backoffice.dashboard');
    });
    Route::get('backoffice/contact', function ()    {
        return view('backoffice.contact');
    });


});

Route::group(['middleware' => 'secretary'], function () {
    Route::get('backoffice/secretary', function ()    {
        //return view('backoffice.secretary.rdv.index');
        $date = date('Y-m-d', time());
        return redirect()->action('SecretaryRdvController@index');
    });
    Route::get('backoffice/secretary/validateRDV', function ()    {
        return view('backoffice.secretary.validateRDV');
    });
    Route::get('backoffice/secretary/patient/rdv',[
        'as' => 'backoffice.secretary.patient.rdv',
        'uses' => 'SecretaryPatientController@rdv'
    ]);
    Route::get('backoffice/secretary/patient/rdv',[
        'as' => 'backoffice.secretary.patient.rdv',
        'uses' => 'SecretaryPatientController@rdv'
    ]);


    Route::get('backoffice/secretary/hemostate', function ()    {
        return view('backoffice.secretary.indicators.hemostate');
    });
    Route::post('backoffice/secretary/rdv/pay',[
        'as' => 'backoffice.secretary.rdv.pay',
        'uses' => 'SecretaryRdvController@pay'
    ]);

  /*  Route::get('backoffice/secretary/patientAnalysis/{id}/createRes', function ()    {
        //return view('backoffice.secretary.rdv.index');
       // $date = date('Y-m-d', time());
        return  view('backoffice.secretary.patientAnalysis.createRes');
    });
*/
    Route::get('backoffice/secretary/patientAnalysis/{id}/createRes', [

        'uses' => 'SecretaryPatientAnalysisController@createRes'
    ]);

    Route::put('backoffice/secretary/patientAnalysis/storeRes/{pha}', 'SecretaryPatientAnalysisController@storeRes');

    //Route::patch('backoffice/secretary/patientAnalysis/storeRes/{pha}', 'SecretaryPatientAnalysisController@storeRes');

    Route::post('backoffice/secretary/patientAnalysis/storeRes/{pha}',[
        'as' => 'backoffice.secretary.patientAnalysis.storeRes',
        'uses' => 'SecretaryPatientAnalysisController@storeRes                                                           '
    ]);


    Route::get('backoffice/secretary/patientAnalysis/{id}/viewRes', [

        'uses' => 'SecretaryPatientAnalysisController@viewRes'
    ]);

    //Route::patch('backoffice/secretary/patientAnalysis/storeRes/{pha}', 'SecretaryPatientAnalysisController@storeRes');


    Route::post('backoffice/secretary/patient/rdv', 'SecretaryPatientController@rdv');

    Route::resource('backoffice/secretary/patient', 'SecretaryPatientController');
    Route::resource('backoffice/secretary/patientAnalysis', 'SecretaryPatientAnalysisController');


    Route::resource('backoffice/secretary/rdv', 'SecretaryRdvController');



    Route::resource('backoffice/secretary/payment', 'SecretaryPaymentController');
});





Route::group(['middleware' => 'doctor'], function () {
   /* Route::get('backoffice/doctor', function ()    {
        $date = date('Y-m-d', time());
        return redirect()->action('DoctorRdvController@index');
    });*/
    Route::get('backoffice/doctor', 'DoctorRdvController@index');

    Route::post('backoffice/doctor/rdv/pay',[
        'as' => 'backoffice.doctor.rdv.pay',
        'uses' => 'DoctorRdvController@pay'
    ]);

    Route::get('backoffice/doctor/patient/rdv',[
        'as' => 'backoffice.doctor.patient.rdv',
        'uses' => 'DoctorPatientController@rdv'
    ]);
    Route::get('backoffice/doctor/patient/rdv',[
        'as' => 'backoffice.doctor.patient.rdv',
        'uses' => 'DoctorPatientController@rdv'
    ]);

    Route::get('backoffice/doctor/patientAnalysis/{id}/viewRes', [

        'uses' => 'DoctorPatientAnalysisController@viewRes'
    ]);



    Route::post('backoffice/doctor/patient/rdv', 'DoctorPatientController@rdv');
    Route::resource('backoffice/doctor/patientAnalysis', 'DoctorPatientAnalysisController');

    Route::resource('backoffice/doctor/patient', 'DoctorPatientController');



    Route::resource('backoffice/doctor/rdv', 'DoctorRdvController');
    Route::resource('backoffice/doctor/payment', 'DoctorPaymentController');

});




Route::get('test', function () {
    return view('test');
});

Route::get('backoffice/testdate', function () {
    return view('backoffice.testdate');
});



Route::get('/backoffice/dashboard', function () {
    return view('backoffice/dashboard');
});

Route::get('backoffice/contact', function () {
    return view('backoffice.contact');
});

// Authentication routes...
Route::get('backoffice/auth/login', 'Auth\AuthController@getLogin');
Route::post('backoffice/auth/login', 'Auth\AuthController@postLogin');
Route::get('backoffice/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('backoffice/auth/register', 'Auth\AuthController@getRegister');
Route::post('backoffice/auth/register', 'Auth\AuthController@postRegister');






Route::group(['middleware' => ['web']], function () {
// front office **************************

Route::resource('/', 'WelcomeController');
Route::post('search', 'SearchController@search');
Route::get('details/{establishment}', 'SearchController@details');
Route::get('rdv1/{user}', 'RDVController@step1');


Route::get('rdv2/{user}',[
    'as' => 'rdv2',
    'uses' => 'RDVController@step2'
]);



Route::patch('rdv2/{user}', 'RDVController@step2');

Route::get('rdv3/{user}',[
    'as' => 'rdv3',
    'uses' => 'RDVController@step3'
]);
Route::post('rdv3/{user}', 'RDVController@step3');
Route::get('rdv4/{user}',[
    'as' => 'rdv4',
    'uses' => 'RDVController@step4'
]);



Route::patch('rdv4/{user}', 'RDVController@step4');



// Authentication routes...
Route::get('auth/login', 'Auth\PatientAuthController@getLogin');
Route::post('auth/login', 'Auth\PatientAuthController@postLogin');
Route::get('auth/logout', 'Auth\PatientAuthController@getLogout');


Route::get('contact', 'WelcomeController@contact');

Route::get('apropos', function () {
    return view('apropos');
});

Route::get('faq', function () {
    return view('faq');
});


// Registration routes...
Route::get('auth/register', 'Auth\PatientAuthController@getRegister');
Route::post('auth/register', 'Auth\PatientAuthController@postRegister');



//espace patient
    Route::get('patient/doctors', 'EspacePatientController@doctors');

    Route::resource('patient/doctors', 'EspacePatientController@doctors');


    Route::resource('patient/consultations', 'EspacePatientController@consult');
    Route::resource('patient/payments', 'EspacePatientController@pay');
    Route::resource('patient/insure', 'EspacePatientController@insure');
    Route::resource('patient/modifyProfile', 'EspacePatientController@profile');
    Route::put('patient/{user}', 'EspacePatientController@update');
Route::resource('patient/RdvList', 'EspacePatientController@rdvList');

Route::resource('patient', 'EspacePatientController@view');


});