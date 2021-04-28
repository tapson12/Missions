<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Structure;
use App\Models\Missions\TypeStructure;
use App\Models\Missions\Agent;
use Illuminate\Support\Facades\Auth;
class StructureController extends Controller
{
    //

    public function index()
    {
        $structures=Structure::paginate(10);

        return view('missions.missionview.structures',compact(['structures']));

    }

    public function create()
    {
        $types=TypeStructure::all();
        $structures=Structure::all();
        $agents=Agent::all();
        return view('missions.missionview.newstructures',compact(['structures','types','agents']));
    }

    public function store(Request $request)
    {

        if (Auth::check()) {

            $email = Auth::user()->email;
            $structure=new Structure();
            $structure->code=$request->code;
            $structure->libellestructure=$request->libellestructure;
            $structure->profil=$request->profil;
            $structure->responsable=$request->responsable;
            $structure->created_by=$email;
            $structure->update_by=$email;
            $structure->typestructure()->associate($request->type_structure_id);
            $structure->structure()->associate($request->structure_id);

            $structure->save();
            return redirect('/structures');
        }
        else
        {
            return redirect('/login');
        }
    }

   public function viewtail(Request $request)
   {
      $structures=Structure::with('child')->get();
      return $structures->find($request->structure_id);

   }

   public function update($id)
   {
    $types=TypeStructure::all();
    $structures=Structure::all();
    $agents=Agent::all();
    $updatestructure=Structure::find($id);

    return view('missions.missionview.updatestructures',compact(['updatestructure','structures','types','agents']));
   }

   public function edit(Request $request,$id)
   {
    if (Auth::check()) {

        $email = Auth::user()->email;
        $structure= Structure::find($id);
        $structure->libellestructure=$request->libellestructure;
        $structure->profil=$request->profil;
        $structure->responsable=$request->responsable;
        $structure->created_by=$email;
        $structure->update_by=$email;
        $structure->typestructure()->associate($request->type_structure_id);
        $structure->structure()->associate($request->structure_id);

        $structure->save();
        return redirect('/structures');
    }
    else
    {
        return redirect('/login');
    }
   }


   public function destroy($id)
   {
    if (Auth::check()) {

        $email = Auth::user()->email;
        $structure= Structure::find($id);

        $structure->delete();
        return redirect('/structures');
    }
    else
    {
        return redirect('/login');
    }
   }

}
