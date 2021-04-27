<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\TypeStructure;
use Illuminate\Support\Facades\Auth;
class TypeStructureController extends Controller
{
    //

    public function index()
    {

        $types=TypeStructure::paginate(10);

        return view('missions.missionview.typestructure',compact(['types']));

    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $type=new TypeStructure();
            //recuperation de l'identifiant de l'utilisateur connécter
            $email = Auth::user()->email;
            
            $type->libellestructure=$request->libellestructure;
            $type->niveau=$request->niveau;
            $type->created_by=$email;
            $type->update_by=$email;
            $type->save();
    
            return redirect('/type-structure');
        }
        else
        {
            return redirect('/login');
        }
        
    }

    public function edit(Request $request)
    {
        if (Auth::check()) {
            $type= TypeStructure::find($request->id);
            $email = Auth::user()->email;
            $type->libellestructure=$request->libellestructure;
            $type->niveau=$request->niveau;
            $type->update_by=$email;
            $type->save();
    
            return redirect('/type-structure');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $type= TypeStructure::find($id);
            
            $type->delete();
    
            return redirect('/type-structure');
        }
        else
        {
            return redirect('/login');
        } 
    }
}
