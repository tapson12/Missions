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

             $signataire1=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction')
             ->join('agents','agents.matricule','=','signatures.signature_1')
             ->where('structure_id','=',$codestructure)
             ->get();
             $signataire2=DB::table('signatures')->select('matricule','agents.nom','agents.prenom','agents.distinction')
             ->join('agents','agents.matricule','=','signatures.signature_2')
             ->where('structure_id','=',$codestructure)
             ->get();
            return [$signataire1,$signataire2];

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
        $signature=new Signature();

        if(Auth::check())
        {
            $email = Auth::user()->email;
            $signature->signature_1=$request->signataire_1;
            $signature->signature_2=$request->signataire_2;
            $signature->distinction_signataire_1=$request->distinction_1;
            $signature->distinction_signataire_2=$request->distinction_2;
            $signature->created_by=$email;
            $signature->update_by=$email;

            $signature->structure()->associate($request->structure_id);
            $signature->save();
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