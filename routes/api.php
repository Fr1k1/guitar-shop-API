<?php

use App\Http\Controllers\GuitarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('guitars', [GuitarController::class, 'index']); //calling index function from guitar controller
Route::post('guitars', [GuitarController::class, 'store']);
Route::get('guitars/{id}', [GuitarController::class, 'show']);
Route::get('guitars/{id}/edit', [GuitarController::class, 'edit']);
Route::put('guitars/{id}/update', [GuitarController::class, 'update']);
