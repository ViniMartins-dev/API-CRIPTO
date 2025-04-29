<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriptomoedaController;

Route::get('/',  [CriptomoedaController::class, 'index'])->name('criptomoeda.index');

Route::get('/create', [CriptomoedaController::class, 'create'])->name('criptomoeda.create');
Route::post('/store', [CriptomoedaController::class, 'store'])->name('criptomoeda.store');

Route::get('/edit/{id}', [CriptomoedaController::class, 'edit'])->name('criptomoeda.edit');
Route::post('/update/{id}', [CriptomoedaController::class, 'update'])->name('criptomoeda.update');

Route::get('/delete/{id}', [CriptomoedaController::class, 'destroy'])->name('criptomoeda.destroy');
