<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Agent;
use App\Models\Missions\TypeAgent;
use App\Models\Missions\Structure;
use App\Models\Missions\Responsabilite;
use App\Models\Missions\Fonction;
use Illuminate\Support\Facades\Auth;
class AgentController extends Controller
{
    //

    public function index()
    {
        $types=TypeAgent::all();
        $structures=Structure::all();
        $reponsabilites=Responsabilite::all();
        $fonctions=Fonction::all();
        $agents=Agent::paginate(10);

        return view('missions.missionview.agent',compact(['types','agents','structures','fonctions','reponsabilites']));
    }

    public function store(Request $request)
    {


        if (Auth::check()) {
           
            $email = Auth::user()->email;
            $agent=new Agent();
            $agent->matricule=$request->matricule;
            $agent->nom=$request->nom;
            $agent->prenom=$request->prenom;
            $agent->created_by=$email;
            $agent->update_by=$email;
            $agent->datenaissance=$request->datenaissance;
            $agent->sexe=$request->sexe;
            $agent->contact=$request->contact;
            $agent->situationmatrimoniale=$request->situationmatrimoniale;
            $agent->agentexterne=$request->agentexterne;
            $agent->agentactive=true;
            $agent->distinction=$request->distinction;
            $agent->typeagent()->associate($request->type_agent);
            $agent->save();
            return json_encode($agent);
        }
        else
        {
            return redirect('/login');
        }

       
    }
}