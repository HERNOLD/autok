<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

Route::get('/', function () {
    return view('layouts.app');
})->name("home");

Route::get('makers', [MakerController::class, 'index'])->name('makers');
Route::delete('makers/{id}', [MakerController::class, 'destroy'])->name('makers.delete');
Route::get('makers/{id}', [MakerController::class, 'edit'])->name('makers.edit');
Route::patch('makers/{id}', [MakerController::class, 'update'])->name('makers.update');
Route::get('makers/{id}/models', [MakerController::class, 'models'])->name('makers.models');

Route::get('fuels', [FuelController::class, 'index'])->name('fuels');
Route::delete('fuels/{id}', [FuelController::class, 'destroy'])->name('fuels.delete');
Route::get('fuels/{id}', [FuelController::class, 'edit'])->name('fuels.edit');
Route::patch('fuels/{id}', [FuelController::class, 'update'])->name('fuels.update');

Route::get('models', [ModelController::class, 'index'])->name('models');
Route::delete('models/{id}', [ModelController::class, 'destroy'])->name('models.delete');
Route::get('models/{id}', [ModelController::class, 'edit'])->name('models.edit');
Route::patch('models/{id}', [ModelController::class, 'update'])->name('models.update');

Route::get('cars', [CarController::class, 'index'])->name('cars');  // lista
Route::get('cars/create', [CarController::class, 'create'])->name('cars.create'); // űrlap
Route::post('cars', [CarController::class, 'store'])->name('cars.store');  // adat mentése
Route::get('cars/show', [CarController::class, 'index'])->name('cars.show'); // autók listája
Route::delete('cars/{id}', [CarController::class, 'destroy'])->name('cars.delete');
Route::get('cars/{id}', [CarController::class, 'edit'])->name('cars.edit');
Route::patch('cars/{id}', [CarController::class, 'update'])->name('cars.update');