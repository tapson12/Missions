<?php

namespace App\Http\Controllers;

use App\Models\Missions\Commune;
use App\Models\Missions\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommuneController extends Controller
{
    //page d'acceuil
    public function index(){
        $communes=Commune::paginate(10);
        $provinces=Province::all();
        return view('missions.decoupage.commune',compact(['communes','provinces']));
    }

     //insertion d'une nouvelle province
     public function store( Request $request ){

        if (Auth::check()) {
            $commune = new Commune();
            $email = Auth::user()->email;
            $commune->province_id = $request->idprovince;
            $commune->libelleCommune = $request->libelleCommune;
            $commune->created_by=$email;
            $commune->update_by=$email;
            $commune->save();
            return redirect('/commune');
        }
        else
        {
            return redirect('/login');
        }
    }

    //fonction de mise a jour
    public function edit(Request $request)
    {
        if (Auth::check()) {
            $commune = Commune::find($request->id);
            $email = Auth::user()->email;
            $commune->province_id = $request->idprovince;
            $commune->libelleCommune = $request->libelleCommune;
            $commune->created_by=$email;
            $commune->update_by=$email;
            $commune->save();
            return redirect('/commune');
        }
        else
        {
            return redirect('/login');
        }
    }

    //suppression de la province
    public function destroy($id)
    {
        if (Auth::check()) {
            $commune= Commune::find($id);
            $commune->delete();

            return redirect('/commune');
        }
        else
        {
            return redirect('/login');
        }
    }
}
