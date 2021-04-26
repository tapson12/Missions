<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Structure;
use App\Models\Missions\TypeStructure;
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

        return view('missions.missionview.newstructures',compact(['structures','types']));
    }

    public function store(Request $request)
    {
        

        

        if (Auth::check()) {
           
            $email = Auth::user()->email;
            $structure=new Structure();
            $structure->libellestructure=$request->libellestructure;
            $structure->profil=$request->profil;
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

}
