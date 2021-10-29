<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\User;

class CommonsController extends Controller
{
    // LANDING-PAGE
    public function indexView () {
        $property = Property::latest()->take(3)->get();
        $propertyCount = Property::count();
        $propertySoldCount = Property::where('sold', true)->count();
        $userCount = User::where('role', 1)->count();

        $data = [
            'property' => $property,
            'count'=> [
                'property' => $propertyCount,
                'propertySold' => $propertySoldCount,
                'user' => $userCount
            ]
        ];
        return view('webPage.index', $data);
    }

}
