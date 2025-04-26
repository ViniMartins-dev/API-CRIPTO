<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriptomoedaController;

Route::get('/',  [CriptomoedaController::class, 'index'])->name('criptomoeda.index');
