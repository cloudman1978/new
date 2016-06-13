<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Speciality;
use App\Http\Controllers\Controller;

class AdminSpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality ::all();
        return view('backoffice.admin.specialite.index')
                ->with('specialities', $specialities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.admin.specialite.create');
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

        //return $inputs;

        $specialite = Speciality::create($inputs);

        //return redirect()->route('product.index');
        return redirect()->action('AdminSpecialitiesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialite = Speciality::find($id);

        return view('backoffice.admin.specialite.show')->with('specialite', $specialite);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $specialite = Speciality::find($id);

        return view('backoffice.admin.specialite.edit', compact('specialite', $specialite));
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
        $specialite = Speciality::find($id);
        $specialite->intituleEtab = $request->intituleEtab;
         $specialite->intituleProf = $request->intituleProf;
        $specialite->save();

        return redirect()->route('backoffice.admin.specialite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialite = Speciality::find($id)
            ->delete();
        return redirect()->route('backoffice.admin.specialite.index');
    }
}
