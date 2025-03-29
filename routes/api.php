<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriptoMoedaController;

//ROTAS API
Route::post('/cripto', [CriptoMoedaController::class,'store']);             //inserir um novo objeto

Route::get('/cripto', [CriptoMoedaController::class,'index']);              //vizualizar todos os objetos cadastrados

Route::get('/cripto/{id}', [CriptoMoedaController::class,'show']);          //vizualizar um único objeto

Route::put('/cripto/{id}', [CriptoMoedaController::class,'update']);        //atualizar os dados de um objeto

Route::delete('/cripto/{id}', [CriptoMoedaController::class,'destroy']);    //deletar um objeto da base de dados