<?php

namespace App\Http\Controllers;

use App\Models\Missions\TypeVehicule;
use App\Models\Missions\Vehicule;
use CreateTypeVehiculesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules=Vehicule::paginate(5);
        $typevehicules=TypeVehicule::all();
        return view('missions.missionview.vehicule',compact(['vehicules','typevehicules']));
        //



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
        if (Auth::check()){
            $id=$request->input('libelleTypeVehicule');
            $typevehicule= TypeVehicule::find($id);

            $type=new Vehicule();
            $email = Auth::user()->email;
            $type->typevehicule()->associate($typevehicule);
            $type->immatriculation=$request->immatriculation;
            $type->libellevehicule=$request->libellevehicule;
            $type->created_by=$email;
            $type->update_by=$email;
            $type->save();

            return redirect('/vehicule');
        }
        else
        {
            return redirect('/login');
        }
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
    public function edit(Request $request)
    {

        if (Auth::check()) {
            $type= Vehicule::find($request->id);
            $email = Auth::user()->email;
            $type->immatriculation=$request->immatriculation;
            $type->libellevehicule=$request->liebellevehicule;
            $type->created_by=$email;
            $type->update_by=$email;

            $id=$request->input('libelleTypeVehicule');
            $typevehicule= TypeVehicule::find($id);

            $type->typevehicule()->associate($typevehicule);
            $type->save();

            return redirect('/vehicule');
        }
        else
        {
            return redirect('/login');
        }

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

        if (Auth::check()){

            $type = Vehicule::find($id);
            $type->delete();
            return redirect ('/vehicule');
        }
        else
        {

            return redirect('/login');
        }
    }
}