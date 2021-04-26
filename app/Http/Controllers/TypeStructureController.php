<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Missions\TypeStructure;
class TypeStructureController extends Controller
{
    //

    public function index()
    {

        $types=TypeStructure::paginate(10);

        return view('missions.missionview.typestructure',compact(['types']));

    }
}
