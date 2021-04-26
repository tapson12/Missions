<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\Region;

class RegionController extends Controller
{
    //
    public function index(){
        $regions=Region::paginate(10);
        return view('missions.decoupage.region',compact(['regions']));
    }

    public function creer( Request $request ){
        //insertion dans la base de donnee
        $region = new Region();
        $region->libelleregion = $request->libelleregion;
        $region->save();
        $regions=Region::paginate(10);
        return view('missions.decoupage.region',compact(['regions']));
    }

}
