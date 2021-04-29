<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Agent;
use App\Models\Missions\TypeAgent;
use App\Models\Missions\Structure;
use App\Models\Missions\Responsabilite;
use App\Models\Missions\Fonction;
use App\Models\Missions\Affectation;
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

    public function saveaffectation(Request $request)
    {


        if(Auth::check())
        {
             $email = Auth::user()->email;
            $affectation= new Affectation();
            $activer=$request->activer;
            $agent_id=$request->agent_id;
            $structure_id=$request->structure;
            $fonction_id=$request->fonction;
            $responsabilite_id=$request->responsabilite;
            $affectation->activer=$activer;
            $affectation->datedebut=$request->datedebut;
            $affectation->datefin=$request->datefin;
            $affectation->created_by=$email;
            $affectation->update_by=$email;
            $affectation->structure()->associate($structure_id);
            $affectation->agent()->associate($agent_id);
            $affectation->fonction()->associate($fonction_id);
            $affectation->responsabilite()->associate($responsabilite_id);
            $affectation->save();


            return $request->all();
        }

        return redirect('/login');

    }




    public function destroy($id)
    {
     if (Auth::check()) {

         //$email = Auth::user()->email;
         $agents= Agent::find($id);

         $agents->delete();
         return redirect('/agents');
     }
     else
     {
         return redirect('/login');
     }
    }


}
