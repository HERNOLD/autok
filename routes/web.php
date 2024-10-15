<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('makers', [MakerController::class, 'index'])->name('makers');
// Route::get("makers", [MakerController::class, 'save'])->name('makers');