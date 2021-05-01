<?php

namespace App\Http\Controllers;
use App\Models\Missions\Signature;
use App\Models\Missions\Agent;
use App\Models\Missions\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
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

    public function getsignatairebystructure(Request $request)
    {
           $codestructure= $request->codestructure;

             $signataire1=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction','signatures.id as signataire_id')
             ->join('agents','agents.matricule','=','signatures.signature_1')
             ->where('structure_id','=',$codestructure)
             ->get();
             $signataire2=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction')
             ->join('agents','agents.matricule','=','signatures.signature_2')
             ->where('structure_id','=',$codestructure)
             ->get();
             $parinterim1=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction','signatures.isinterim1','signatures.isparorodre1')
             ->join('agents','agents.matricule','=','signatures.nominterim1')
             ->where('structure_id','=',$codestructure)
             ->get();

             $parinterim2=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction','signatures.isinterim2','signatures.isparorodre2')
             ->join('agents','agents.matricule','=','signatures.nominterim2')
             ->where('structure_id','=',$codestructure)
             ->get();

            return [$signataire1,$signataire2,$parinterim1,$parinterim2];

    }

    public function getsignatairebysignataireone(Request $request)
    {
        $codeagent=$request->codeagent1;
        $agent=DB::table('agents')->select('distinction')
        ->where('matricule','=',$codeagent)
        ->get();
          
        return $agent;

    }
    public function getsignatairebysignatairetwo(Request $request)
    {
        $codeagent=$request->codeagent2;
        $agent=DB::table('agents')->select('distinction')
        ->where('matricule','=',$codeagent)
        ->get();
          
        return $agent;

    }

    public function store(Request $request)
    {
        
        if(Auth::check())
        {
            if(Signature::find($request->id)==null)
            {
                $signature=new Signature();
                $email = Auth::user()->email;
                $signature->signature_1=$request->signataire_1;
                $signature->signature_2=$request->signataire_2;
                $signature->distinction_signataire_1=$request->distinction_1;
                $signature->distinction_signataire_2=$request->distinction_2;
                $signature->isinterim1=$request->parinterim1;
                $signature->isinterim2=$request->parinterim2;
                $signature->isparorodre1=$request->parordre1;
                $signature->isparorodre2=$request->parordre2;
                $signature->nominterim1=$request->nominterim1;
                $signature->nominterim2=$request->nominterim2;
                $signature->created_by=$email;
                $signature->update_by=$email;

                $signature->structure()->associate($request->structure_id);
                $signature->save();
            }else
            {
                $signature= Signature::find($request->id);
                $email = Auth::user()->email;
                $signature->signature_1=$request->signataire_1;
                $signature->signature_2=$request->signataire_2;
                $signature->distinction_signataire_1=$request->distinction_1;
                $signature->distinction_signataire_2=$request->distinction_2;
                $signature->isinterim1=$request->parinterim1;
                $signature->isinterim2=$request->parinterim2;
                $signature->isparorodre1=$request->parordre1;
                $signature->isparorodre2=$request->parordre2;
                $signature->nominterim1=$request->nominterim1;
                $signature->nominterim2=$request->nominterim2;
                $signature->created_by=$email;
                $signature->update_by=$email;
                $signature->structure()->associate($request->structure_id);
                $signature->save();
            }
            
            return redirect('/signataire');
        }
    }

    public function update($id)
    {
        $signature=Signature::find($id);
        $agents=Agent::all();
        $structures=Structure::all();

        return view('missions.missionview.updatesignataire',compact(['agents','structures','signature']));
    }
}
