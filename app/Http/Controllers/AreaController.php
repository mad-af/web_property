<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function index(Request $request)
    {
        $areaData = Area::all();
        return view('adminPage.area')->with('areaData', $areaData);
    }
}
