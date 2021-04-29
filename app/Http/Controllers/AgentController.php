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
        $affectations=Affectation::all();
        $fonctions=Fonction::all();
        $agents=Agent::paginate(10);
        
        return view('missions.missionview.agent',compact(['types','agents','structures','fonctions','reponsabilites','affectations']));
    }

    public function store(Request $request)
    {


        if (Auth::check()) {
         $nummatricule=str_replace(' ','',$request->matricule);
           $messages=[
                'matricule.required'=>"l'agent existe déja",
                'matricule.unique'=>'le matricule existe déja',
                'nom.required'=>'le nom est obligatoire',
                'prenom.required'=>'le prenom est obligatoire'
           ];
            $validator = \Validator::make($request->all(), [ 
                'matricule' => 'required|unique:agents',
                'nom' => 'required',
                'prenom'=>'required',
            ],$messages);

            $email = Auth::user()->email;
            $agent=new Agent();
            $nummatricule=str_replace(' ','',$request->matricule);
            $agent->matricule=$nummatricule;
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
           

            if ($validator->fails()) {
               
               return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
            
                ), 400);
              

             }else
             {
                $agent->save();

                return response()->json(array('success' => true), 200);
             }

            
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
}
