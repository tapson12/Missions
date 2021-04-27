<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Region;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    //
    public function index(){
        $regions=Region::paginate(10);
        return view('missions.decoupage.region',compact(['regions']));
    }

    //insertion d'une nouvelle region
    public function store( Request $request ){

        if (Auth::check()) {
            $region = new Region();
            $email = Auth::user()->email;
            $region->libelleregion = $request->libelleregion;
            $region->created_by=$email;
            $region->update_by=$email;
            $region->save();
            return redirect('/region');
        }
        else
        {
            return redirect('/login');
        }
        //insertion dans la base de donnee

    }


    //fonction de mise a jour
    public function edit(Request $request)
    {
        if (Auth::check()) {
            $region= Region::find($request->id);
            $email = Auth::user()->email;
            $region->libelleregion = $request->libelleregion;
            $region->created_by=$email;
            $region->update_by=$email;
            $region->save();

            return redirect('/region');
        }
        else
        {
            return redirect('/login');
        }
    }

    //suppression d'une region
    public function destroy($id)
    {
        if (Auth::check()) {
            $region= Region::find($id);
            $region->delete();

            return redirect('/region');
        }
        else
        {
            return redirect('/login');
        }
    }

}
