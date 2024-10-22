<?php

use App\Http\Controllers\FuelController;
use App\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

Route::get('/', function () {
    return view('layouts.app');
})->name("home");

Route::get('makers', [MakerController::class, 'index'])->name('makers.get');
Route::delete('makers/{id}', [MakerController::class, 'destroy'])->name('makers.delete');

Route::get('fuels', [FuelController::class, 'index'])->name('fuels');
Route::delete('fuels/{id}', [FuelController::class, 'destroy'])->name('fuels.delete');
Route::get('fuels/{id}', [FuelController::class, 'edit'])->name('fuels.edit');
Route::patch('fuels/{id}', [FuelController::class, 'update'])->name('fuels.update');


Route::get('models', [ModelController::class, 'index'])->name('models');
Route::delete('models/{id}', [ModelController::class, 'destroy'])->name('models.delete');
Route::get('models/{id}', [ModelController::class, 'edit'])->name('models.edit');
Route::patch('models/{id}', [ModelController::class, 'update'])->name('models.update');