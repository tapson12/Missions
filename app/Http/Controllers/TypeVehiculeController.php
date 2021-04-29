<?php

namespace App\Http\Controllers;

use App\Models\Missions\TypeVehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeVehiculeController extends Controller
{

    public function index()
    {
        $typevehicules=TypeVehicule::paginate(10);
        return view('missions.missionview.typevehicule',compact(['typevehicules']));
    }



    public function store(Request $request)
    {
        if (Auth::check()) {
            $typev=new TypeVehicule();
            $email = Auth::user()->email;
            $typev->libelletypevehicule=$request->libelletypevehicule;
            $typev->created_by=$email;
            $typev->update_by=$email;
            $typev->save();

            return redirect('/type-vehicule');
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
            $typev= TypeVehicule::find($request->id);
            $email = Auth::user()->email;
            $typev->libelletypevehicule=$request->libelletypevehicule;
            $typev->created_by=$email;
            $typev->update_by=$email;
            $typev->save();

            return redirect('/type-vehicule');
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
        if (Auth::check()) {
            $typev= TypeVehicule::find($id);

            $typev->delete();

            return redirect('/type-vehicule');
        }
        else
        {
            return redirect('/login');
        }
    }
}
