<?php

namespace App\Http\Controllers;

use App\Models\Explorers;
use App\Models\Items;
use App\Models\Troca;
use Illuminate\Http\Request;

class TrocaController extends Controller
{
    
    public function trocar(Request $request)
    {
        $request->validate([
            'explorers_origem_id' => 'required|exists:explorers,id',
            'explorers_destino_id' => 'required|exists:explorers,id',
            'items_origem' => 'required|array',
            'items_origem.*' => 'exists:items,id',
            'items_destino' => 'required|array',
            'items_destino.*' => 'exists:items,id',
        ]);

        $explorersOrigem = Explorers::findOrFail($request->explorers_origem_id);
        $explorersDestino = Explorers::findOrFail($request->explorers_destino_id);
        $itemsOrigem = Items::whereIn('id', $request->items_origem)->where('explorers_id', $explorersOrigem->id)->get();
        $itemsDestino = Items::whereIn('id', $request->items_destino)->where('explorers_id', $explorersDestino->id)->get();

        $valorOrigem = $itemsOrigem->sum('valor');
        $valorDestino = $itemsDestino->sum('valor');

        if ($valorOrigem != $valorDestino) {
            return response()->json(['error' => 'Troca não é equivalente'], 400);
        }

        foreach ($itemsOrigem as $item) {
            $item->explorers_id = $explorersDestino->id;
            $item->save();
        }

        foreach ($itemsDestino as $item) {
            $item->explorador_id = $explorersOrigem->id;
            $item->save();
        }

        Troca::create([
            'explorers_origem_id' => $explorersOrigem->id,
            'explorers_destino_id' => $explorersDestino->id,
            'items_origem' => $request->items_origem,
            'items_destino' => $request->items_destino
        ]);

        return response()->json(['message' => 'Troca realizada com sucesso']);
    }
}
