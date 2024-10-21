<?php

use App\Http\Controllers\FuelController;
use App\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

Route::get('/', function () {
    return view('layouts.app');
})->name("home");

Route::get('makers', [MakerController::class, 'index'])->name('makers');
Route::get('fuels', [FuelController::class, 'index'])->name('fuels');
Route::get('models', [ModelController::class, 'index'])->name('models');