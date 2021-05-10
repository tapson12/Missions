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
use App\Models\Missions\TypeAgent;
use Illuminate\Support\Facades\Auth;
use App\Models\Missions\Agent;
use App\Models\Missions\MissionInterne;
use App\Models\Missions\LieuMission;
use App\Models\Missions\Affectation;
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

        $structures=DB::table('structures')
        ->select('id','code')
        ->where('isstructureinterne','=',false)->get();
        
        $vehicules=Vehicule::all();
        $regions=Region::all();
        $provinces=Province::all();
        $communes=Commune::all();
        $ordremission=MissionInterne::paginate(10);
        $types=TypeAgent::all();
        $sourceinternes=DB::table('structures')
        ->select('id','code','type')
        ->where('type','=',false)->get();
        $sourceprojets=DB::table('structures')
        ->select('id','code','type')
        ->where('type','=',true)->get();

        $sourcefincancements=SourceFinancement::all();

        return view ('missions\missionview\missioninterne',compact(['structures','vehicules','regions','provinces','communes','sourcefincancements','types','sourceinternes','sourceprojets','ordremission']));
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
        $lieuxmision=$request->lieux_mission;
        $membremission=$request->membremission;
        $structure=Structure::find($request->structure_id);
        $hierachie=[];
      
        
        if($structure->allStructures()->first()!=null)
        {
           
            array_push( $hierachie,$structure->allStructures()->first());

            if($structure->allStructures()->first()->allStructures()->first()!=null)
            {

                array_push( $hierachie,$structure->allStructures()->first()->allStructures()->first());
                if($structure->allStructures()->first()->allStructures()->first()->allStructures()->first()!=null)
            {

                array_push( $hierachie,$structure->allStructures()->first()->allStructures()->first()->allStructures()-first());
            
                if($structure->allStructures()->first()->allStructures()->first()->allStructures()->first()->allStructures()->first()!=null)
            {

                array_push( $hierachie,$structure->allStructures()->first()->allStructures()->first()->allStructures()-first()->allStructures()->first());
            }
            }  
            }   
            array_push($hierachie,$structure); 
        }

            $source_id=explode(',',$request->hebergement)[0];
            $type_source=explode(',',$request->hebergement)[1];
            

        $signataire=null;
        if($type_source=='interne' || $type_source=='externe')
        {
            $signataire=DB::table('signatures')
            ->select('*')
            ->join('structures','signatures.structure_id','=','structures.id')
            ->where('structures.id','=',$request->structure_id)->get();
        }
        if($type_source=='projet')
        {
            $structure_signataire=Structure::find($source_id);

            $structu=$structure_signataire->allStructures()->first();
            $signataire=DB::table('signatures')
            ->select('*')
            ->join('structures','signatures.structure_id','=','structures.id')
            ->where('structures.id','=',$structu->id)->get();
            
        }

        $signature1=DB::table('signatures')
            ->select('agents.nom','agents.prenom','agents.distinction','matricule')
            ->join('agents','agents.matricule','=','signatures.signature_1')
            ->where('agents.matricule','=',$signataire[0]->signature_1)->get();
            
            $signature2=DB::table('signatures')
            ->select('agents.nom','agents.prenom','agents.distinction','matricule')
            ->join('agents','agents.matricule','=','signatures.signature_2')
            ->where('agents.matricule','=',$signataire[0]->signature_2)->get();


       
        if(Auth::check())
        {


           $missioninterne= new MissionInterne();
           
           $missioninterne->datedepart=$request->datedepart;
           $missioninterne->objet=$request->objetmission;
           $missioninterne->dateretour=$request->datefin;
           $missioninterne->incidencefinanciere=false;
           $missioninterne->chefmission=$request->chefmission;
           $missioninterne->chauffeurmission=$request->chauffeurmission;
           $missioninterne->logement=Structure::find($source_id)->code;
           $missioninterne->hebergement=Structure::find($source_id)->code;
           $missioninterne->isinterim=$request->isinterim1;
           $missioninterne->isinterim2=$request->isinterim2;
           $missioninterne->isordre=$request->isordre1;
           $missioninterne->isordre2=$request->isordre2;
           $missioninterne->interimname=$request->interiname1;
           $missioninterne->interimname2=$request->interiname2;
           $missioninterne->omagentsignataire1=$signature1[0]->matricule;
           $missioninterne->omagentsignataire2=$signature2[0]->matricule;
           
           $missioninterne->omdistinctionsignataire1=$signature1[0]->distinction;
           $missioninterne->omdistinctionsignataire2=$signature2[0]->distinction;
           $email = Auth::user()->email;

           $missioninterne->created_by=$email;
           $missioninterne->update_by=$email;
           
           foreach ($hierachie as $key => $value) {
            $missioninterne->reference.=$value->code."/";
           }
          
           $membrearray=[];

           foreach ($membremission as $key => $value) {
               $data=Agent::where('matricule',$value)->get();
                $getid=$data[0]->id;
               array_push($membrearray,$getid);
           
        }

          
            $missioninterne->structure()->associate($request->structure_id);
           $missioninterne->vehicule()->associate($request->vehiculemission);

           $missioninterne->save();

           $missioninterne->agent()->syncWithoutDetaching($membrearray);
            $lieu_id=[];
           foreach ($lieuxmision as $key => $value) {
            $lieux=new LieuMission();
            $lieu=explode('/',$value);
            
            
            $lieux->region=$lieu[0];
            $lieux->province=$lieu[1];
            $lieux->commune=$lieu[2];
            $lieux->created_by=$email;
            $lieux->update_by=$email;

            $id = DB::table('lieu_missions')->insertGetId([
                'region' =>$lieu[0] ,
                'province' =>$lieu[1] ,
                'commune' =>$lieu[2] ,
                'created_by' =>$email ,
                'update_by' =>$email ,
            ]);

                
          array_push($lieu_id,$id);
            
            

        }

            $missioninterne->lieumission()->attach($lieu_id);
           

           
          
        }

       
    
        return $missioninterne->id;
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

           $parinterim1=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction','signatures.isinterim1','signatures.isparorodre1')
           ->join('agents','agents.matricule','=','signatures.nominterim1')
           ->where('structure_id','=',$request->codestructure)
           ->get();

           $parinterim2=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction','signatures.isinterim2','signatures.isparorodre2')
           ->join('agents','agents.matricule','=','signatures.nominterim2')
           ->where('structure_id','=',$request->codestructure)
           ->get();

            return ["signataire1"=>$signature1,"signataire2"=>$signature2,"structure"=>$structuremission,"parinterim1"=>$parinterim1,"parinterim2"=>$parinterim2];
        
    }

    public function filtrestructuremission(Request $request)
    {
        $structure=DB::table('structures')
            ->select('id','code')
            ->where('isstructureinterne','!=',$request->type_structure)->get();

            return $structure;
    }

    public function filteragent(Request $request)
    {
        $structures=DB::table('affectations')
        ->select('agents.matricule','agents.nom','agents.prenom','structures.code','responsabilites.code as coderespond')
        ->join('agents','affectations.agent_id','=','agents.id')
        ->join('structures','affectations.structure_id','=','structures.id')
        ->join("responsabilites","responsabilites.id","=","affectations.responsabilite_id")
        ->where('structures.id','=',$request->codestructure)->get();

        return $structures;

    }

    public function displayordremission($id)
    {
        $mission=MissionInterne::find($id);
        $structure=Structure::find($mission->structure->id);
        $signature1=Agent::where('matricule',$mission->omagentsignataire1)->first();
        $signature2=Agent::where('matricule',$mission->omagentsignataire2)->first();
        $hierachie=[];
        $signataireinterim1=null;
        $signataireinterim2=null;
        $affectationinterim1=null;
        $affectationinterim2=null;
        if($structure->allStructures()->first()!=null)
        {
           
            array_push( $hierachie,$structure->allStructures()->first());

            if($structure->allStructures()->first()->allStructures()->first()!=null)
            {

                array_push( $hierachie,$structure->allStructures()->first()->allStructures()->first());
                if($structure->allStructures()->first()->allStructures()->first()->allStructures()->first()!=null)
            {

                array_push( $hierachie,$structure->allStructures()->first()->allStructures()->first()->allStructures()-first());
            
                if($structure->allStructures()->first()->allStructures()->first()->allStructures()->first()->allStructures()->first()!=null)
            {

                array_push( $hierachie,$structure->allStructures()->first()->allStructures()->first()->allStructures()-first()->allStructures()->first());
            }
            }  
            }   
            array_push($hierachie,$structure); 
        }

        if($mission->isinterim ==true || $mission->isordre ==true)
        {
            $signataireinterim1=Agent::where('matricule',$mission->interimname)->get();
            $affectationinterim1=Affectation::where('agent_id',$signataireinterim1->first()->id)->get();
        }
        if($mission->isinterim2 ==true || $mission->isordre2 ==true)
        {
            $signataireinterim2=Agent::where('matricule',$mission->interimname2)->get();
           // $affectationinterim2=Affectation::where('agent_id',$signataireinterim2->first()->id)->get();
        }
        
        return view('missions.missionview.reporting.reportordre',compact(['mission','hierachie','signature1','signature2','signataireinterim1','signataireinterim2','affectationinterim1','affectationinterim2']));
    }

    public function verifiedoublon(Request $request)
    {
        $matricule=$request->matricule;
        $startdate=$request->startdate;
        $enddate=$request->enddate;

        $doublon=DB::table('mission_internes')
        ->select('agents.id')
        ->join('agent_mission_internes','mission_internes.id','=','agent_mission_internes.mission_interne_id')
        ->join('agents','agents.id','=','agent_mission_internes.agent_id')
        ->where('agents.matricule','=',$matricule)
        ->whereBetween('mission_internes.datedepart',[$startdate,$enddate])
        ->get()->count();

        return $doublon;

    }

    public function annexe()
    {
        return view('missions.missionview.reporting.reportordreannexe');
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
