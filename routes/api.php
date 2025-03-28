<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriptoMoedaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/cripto', [CriptoMoedaController::class,'store']);

Route::get('/cripto', [CriptoMoedaController::class,'index']);
