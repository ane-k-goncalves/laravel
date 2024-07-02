<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Explorers;

class ItemsController extends Controller
{
    public function store(Request $request)
    {

        $items = Items::create($request->all());
        return response()->json($items, 201);
    }

    public function show($id)
    {
      $explorer = Explorers::with('explorers_id')->findOrFail($id);
      return response()->json($explorer);
    }

}
