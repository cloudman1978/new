<?php

namespace App\Http\Controllers;

use App\Indicator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicators = Indicator::all();
        return view('backoffice.admin.indicators.index')
            ->with('indicators', $indicators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.admin.indicators.create');
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
        Indicator::create($inputs);
        return redirect()->action('AdminIndicatorController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indicator = Indicator::find($id);
        return view('backoffice.admin.indicators.show')
            ->with('indicator', $indicator);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicator = Indicator::find($id);
        return view('backoffice.admin.indicators.edit')
            ->with('indicator', $indicator);
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
        $indicator = Indicator::find($id);
        $inputs = $request->all();

        $indicator->name = $request->name;
        $indicator->description = $request->description;
        $indicator->unity = $request->unity;
        $indicator->valUs = $request->valUs;
        $indicator->save();

        return redirect()->route('backoffice.admin.indicators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicator = Indicator::find($id)
            ->delete();
        return redirect()->route('backoffice.admin.indicators.index');
    }
}
