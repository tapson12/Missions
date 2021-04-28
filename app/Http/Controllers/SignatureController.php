<?php

namespace App\Http\Controllers;
use App\Models\Missions\Signature;
use App\Models\Missions\Agent;
use App\Models\Missions\Structure;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    //

    public function index()
    {
        $signataires=Signature::paginate(10);

        return view('missions.missionview.signature',compact(['signataires']));


    }
    public function create()
    {
        $agents=Agent::all();
        $structures=Structure::all();

        return view('missions.missionview.newsignataire',compact(['agents','structures']));
    }
}
