<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;


class UsermanagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users=User::all();
        return view('missions.usermanager.users',compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles =Role::all();

        return view('auth.register',compact('roles'));

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
        $user= User::create([
            'name' =>$request->name ,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);// a revoir avec assane
        return redirect('/users');
    }

    public function displaypasswordupdate($id)
    {
        $isegale=false;
        $user=User::findOrFail($id);
        return view('missions.usermanager.updatepassword',compact(['isegale','user']));
    }


    public function updateprocesspassword(Request $request,$id)
    {
        $isegale=false;
        $user=User::findOrFail($id);
        if($request->newpassword !=$request->newconfirmpassword)
        {
            $isegale=true;
            return view('missions.usermanager.updatepassword',compact(['user','isegale']));

        }else
        {

            $user->password=Hash::make($request->newpassword);
            $user->save();
            return redirect('/users');
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
    public function edit($id)
    {
        //
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
            $user= User::find($id);
            $user->delete();

            return redirect('/users');
        }
        else
        {
            return redirect('/login');
        }
    }
}
