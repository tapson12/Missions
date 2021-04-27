<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Result;
use App\Models\Missions\Responsabilite;

class ResponsabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $responsabilites=Responsabilite::paginate(10);

        return view('missions.missionview.responsabilite',compact(['responsabilites']));
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
            $responsabilite=new Responsabilite();
            $email = Auth::user()->email;
            $responsabilite->code=$request->code;

            $responsabilite->created_by=$email;
            $responsabilite->update_by=$email;
            $responsabilite->save();

            return redirect('/responsabilite');
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
            $responsabilite= Responsabilite::find($request->id);
            $email = Auth::user()->email;
            $responsabilite->code=$request->code;

            $responsabilite->update_by=$email;
            $responsabilite->save();

            return redirect('/responsabilite');
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

        if (Auth::check()) {
            $responsabilite= Responsabilite::find($id);

            $responsabilite->delete();

            return redirect('/responsabilite');
        }
        else
        {
            return redirect('/login');
        }

    }
}
