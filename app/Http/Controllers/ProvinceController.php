<?php

namespace App\Http\Controllers;

use App\Models\Missions\Province;
use App\Models\Missions\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinceController extends Controller
{
    //page d'acceuil
    public function index(){
        $provinces=Province::paginate(10);
        $regions=Region::all();
        return view('missions.missionview.decoupage.province',compact(['provinces','regions']));
    }

     //insertion d'une nouvelle province
     public function store( Request $request ){

        if (Auth::check()) {

            $validata=$request->validate([
                'libelleProvince'=>'required|unique:provinces'
            ]);

            $province = new Province();
            $email = Auth::user()->email;
            $province->region_id = $request->idregion;
            $province->libelleProvince = ucwords($request->libelleProvince);
            $province->created_by=$email;
            $province->update_by=$email;
            $province->save();
            return redirect('/province');
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
            $validata=$request->validate([
                'libelleProvince'=>'required|unique:provinces'
            ]);
            $province = Province::find($request->id);
            $email = Auth::user()->email;
            $province->region_id = $request->idregion;
            $province->libelleProvince = ucwords($request->libelleProvince);
            $province->created_by=$email;
            $province->update_by=$email;
            $province->save();
            return redirect('/province');
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
            $province= Province::find($id);
            $province->delete();

            return redirect('/province');
        }
        else
        {
            return redirect('/login');
        }
    }
}
