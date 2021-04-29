<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Missions\SourceFinancement;

class SourceFinancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sourcefinancements=SourceFinancement::paginate(10);

        return view('missions.missionview.sourcefinancement',compact(['sourcefinancements']));
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
            $sourcefinancement=new SourceFinancement();
            $email = Auth::user()->email;
            $sourcefinancement->libellesourcefinancement=$request->libellesourcefinancement;

            $sourcefinancement->created_by=$email;
            $sourcefinancement->update_by=$email;
            $sourcefinancement->save();

            return redirect('/source-financement');
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
            $sourcefinancement= SourceFinancement::find($request->id);
            $email = Auth::user()->email;
            $sourcefinancement->libellesourcefinancement=$request->libellesourcefinancement;

            $sourcefinancement->update_by=$email;
            $sourcefinancement->save();

            return redirect('/source-financement');
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
            $sourcefinancement= SourceFinancement::find($id);

            $sourcefinancement->delete();

            return redirect('/source-financement');
        }
        else
        {
            return redirect('/login');
        }
        //
    }
    
}
