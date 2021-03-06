<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Fonction;
use Illuminate\Support\Facades\Auth;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fonctions=Fonction::paginate(10);

        return view('missions.missionview.fonction',compact(['fonctions']));
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

        if (Auth::check()) {
            
            $validata=$request->validate([
                'libellefonction'=>'required|unique:fonctions'
            ]);

            $fonction=new Fonction();
            $email = Auth::user()->email;
            $fonction->libellefonction=$request->libellefonction;

            $fonction->created_by=$email;
            $fonction->update_by=$email;
            $fonction->save();

            return redirect('/fonction');
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
        //
        if (Auth::check()) {
            $fonction= Fonction::find($request->id);
            $email = Auth::user()->email;
            $fonction->libellefonction=$request->libellefonction;

            $fonction->update_by=$email;
            $fonction->save();

            return redirect('/fonction');
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
            $fonction= Fonction::find($id);

            $fonction->delete();

            return redirect('/fonction');
        }
        else
        {
            return redirect('/login');
        }
        //
    }
}
