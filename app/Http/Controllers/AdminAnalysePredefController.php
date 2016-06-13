<?php

namespace App\Http\Controllers;

use App\AnalysePredef;
use App\AnalysePredefHasIndicator;
use App\Indicator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminAnalysePredefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analysepredefs = AnalysePredef::all();

        foreach($analysepredefs as $an){

            $id = $an->id;

            $indicators = DB::table('analyse_predef_has_indicator')
                ->join('indicators', 'indicators.id', '=', 'analyse_predef_has_indicator.indicator_id')
                ->join('analyses_predef', 'analyses_predef.id', '=', 'analyse_predef_has_indicator.analyse_predef_id')
                ->where('analyses_predef.id', '=', $id)
                ->select( 'indicators.name', 'indicators.description')
                ->get();
            $an->indicators = $indicators;

        }

        return view('backoffice.admin.analysepredef.index')
            ->with('analysepredefs', $analysepredefs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicators = Indicator::all();
        return view('backoffice.admin.analysepredef.create')
            ->with('indicators', $indicators);
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

      /*  echo '<pre>';
        print_r($inputs);
        exit();
      */

        $indics = $inputs['indic'];

        $indics = array_unique($indics);
        unset($inputs['indic']);

        unset($inputs['inds']);
        /*      echo '<pre>';
              print_r($inputs);
              exit();
      */
        $ap = AnalysePredef ::create([
            'name' => $inputs['name'],
        ]);
        /*  echo '<pre>';
          print_r($pha);
          exit();*/

        foreach($indics as $indic){
            /*  echo '<pre>';
              print_r($indic);
              exit();
            */
            $indice = Indicator::find($indic);
            AnalysePredefHasIndicator::create([
                'analyse_predef_id' => $ap->getKey(),
                'indicator_id' => $indic,
                //'result' => Null
            ]);
        }


        return redirect()->action('AdminAnalysePredefController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analyse = AnalysePredef::find($id);
        $indicators = DB::table('analyse_predef_has_indicator')
            ->join('indicators', 'indicators.id', '=', 'analyse_predef_has_indicator.indicator_id')
            ->join('analyses_predef', 'analyses_predef.id', '=', 'analyse_predef_has_indicator.analyse_predef_id')
            ->where('analyses_predef.id', '=', $id)
            ->select( 'indicators.name', 'indicators.description')
            ->get();
        $analyse->indicators = $indicators;
        return view('backoffice.admin.analysepredef.show')
            ->with('analyse', $analyse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analyse = AnalysePredef::find($id);
        $indicators = DB::table('analyse_predef_has_indicator')
            ->join('indicators', 'indicators.id', '=', 'analyse_predef_has_indicator.indicator_id')
            ->join('analyses_predef', 'analyses_predef.id', '=', 'analyse_predef_has_indicator.analyse_predef_id')
            ->where('analyses_predef.id', '=', $id)
            ->select( 'indicators.*')
            ->get();
        $analyse->indicators = $indicators;
        $indicators = Indicator::all();
        return view('backoffice.admin.analysepredef.edit')
            ->with('analyse', $analyse)
            ->with('indicators', $indicators);
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
        $analyse = AnalysePredef::find($id);
        $analyse->name = $request->name;

        $inputs = $request->all();
       /* echo '<pre>';
        print_r($inputs);
        exit();
       */
       if(isset($inputs['indic']) && !empty($inputs['indic'])){

            $indics = $inputs['indic'];
           $indics = array_unique($indics);
            unset($inputs['indic']);

            $analyse->save();
            // DB::table('user_has_establishment')->where('establishment_id', '=', $establishment->id)->delete();
            DB::table('analyse_predef_has_indicator')->where('analyse_predef_id', '=', $analyse->id)->delete();

            foreach($indics as $i){

                // echo $selectValue."<br>";
                AnalysePredefHasIndicator::create([
                    'analyse_predef_id' => $analyse->id,
                    'indicator_id' => $i
                ]);
            }
        }
        else{
            unset($inputs['indic']);
            $analyse->save();
        }
        return redirect()->route('backoffice.admin.analysepredef.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analyse = AnalysePredef::find($id)
            ->delete();
        return redirect()->route('backoffice.admin.analysepredef.index');
    }
}
