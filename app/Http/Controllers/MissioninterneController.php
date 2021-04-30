<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Structure;
use App\Models\Missions\Vehicule;
use App\Models\Missions\Region;
use App\Models\Missions\Province;
use App\Models\Missions\Commune;
use App\Models\Missions\SourceFinancement;
use App\Models\Missions\Signature;
use DB;
class MissioninterneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures=Structure::all();
        $vehicules=Vehicule::all();
        $regions=Region::all();
        $provinces=Province::all();
        $communes=Commune::all();
        $sourcefincancements=SourceFinancement::all();

        return view ('missions\missionview\missioninterne',compact(['structures','vehicules','regions','provinces','communes','sourcefincancements']));
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

    public function filterstructure(Request $request)
    {
        $structures=Structure::with('child')->get();
        $signature1=DB::table('signatures')
            ->select('agents.nom','agents.prenom','agents.distinction')
            ->join('agents','agents.matricule','=','signatures.signature_1')
            ->where('structure_id','=',$request->codestructure)->get();

            $signature2=DB::table('signatures')
            ->select('agents.nom','agents.prenom','agents.distinction')
            ->join('agents','agents.matricule','=','signatures.signature_2')
            ->where('structure_id','=',$request->codestructure)->get();
           $structuremission=$structures->find($request->codestructure);

            return ["signataire1"=>$signature1,"signataire2"=>$signature2,"structure"=>$structuremission];
        
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
