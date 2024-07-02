<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocationsController extends Controller
{
    public function store(Request $request)
    {

        $locations = Locations::create($request->all());
        return response()->json($locations, 201);
    }

   
}
