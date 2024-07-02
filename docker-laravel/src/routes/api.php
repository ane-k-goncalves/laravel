<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExplorersController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\TrocaController;
use App\Models\Items;

Route::post('explorers', [ExplorersController::class, 'store']);

Route::put('explorers/{id}', [ExplorersController::class, 'atualizarLocalizacao']);
Route::patch('explorers/{id}', [ExplorersController::class, 'atualizarLocalizacao']);

Route::post('explorers/{id}/item', [ExplorersController::class, 'addItemInventario']);


Route::get('explorers/{id}', [ItemsController::class, 'show']);
Route::get('explorers/{id}/historico', [ExplorersController::class, 'historico']);


Route::post('locations', [LocationsController::class, 'store']);
Route::post('items', [ItemsController::class, 'store']);


Route::post('/exploradores/trocar', [TrocaController::class, 'trocar']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
