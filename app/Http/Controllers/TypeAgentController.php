<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\TypeAgent;
use Illuminate\Support\Facades\Auth;

class TypeAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $typeagents=TypeAgent::paginate(10);

        return view('missions.missionview.typeagent',compact(['typeagents']));
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
            $validdata=$request->validate([
                'typeagent'=>'required|unique:type_agents'
            ]);
            $typeagent=new TypeAgent();
            $email = Auth::user()->email;
            $typeagent->typeagent=$request->typeagent;

            $typeagent->created_by=$email;
            $typeagent->update_by=$email;
            $typeagent->save();

            return redirect('/type-agent');
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
            $typeagent= TypeAgent::find($request->id);
            $email = Auth::user()->email;
            $typeagent->typeagent=$request->typeagent;

            $typeagent->update_by=$email;
            $typeagent->save();

            return redirect('/type-agent');
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
            $typeagent= Typeagent::find($id);

            $typeagent->delete();

            return redirect('/type-agent');
        }
        else
        {
            return redirect('/login');
        }
    }
}
