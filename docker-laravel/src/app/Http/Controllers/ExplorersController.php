<?php

namespace App\Http\Controllers;

use App\Models\Explorers;
use App\Models\Items;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExplorersController extends Controller
{
    public function store(Request $request)
    {

        $explorer = Explorers::create($request->all());
        return response()->json($explorer, 201);
    }

    public function atualizarLocalizacao(Request $request, $id)
    {
        $local = Locations::findOrFail($id);

        $local->update([
            'latitude' =>  $request->latitude,
            'longitude' => $request->longitude,
        ]);


        return response()->json($local, 201);
    
    }

    public function addItemInventario(Request $request, $id)

    {
         $validatedData = $request->validate([
            'items_id' => 'required|exists:items,id',
         ]);

        $item = Items::findOrFail($validatedData['items_id']);
        $item->explorers_id = $id;
        $item->save();

        return response()->json($item, 201);
    }



    public function historico($id)
    {
        Log::info('Exibindo explorador', ['id', $id]);

      $historico = Locations::where('explorers_id', $id)->get();
      return response()->json($historico);
    }
 
}
