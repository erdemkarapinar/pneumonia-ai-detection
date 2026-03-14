<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PredictionController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [PredictionController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
    Route::post('/predict',[PredictionController::class,'predict'])->middleware('auth')->name('predict');
    Route::get('/history',[PredictionController::class,'history'])->middleware('auth')->name('history');
require __DIR__.'/auth.php';
