<?php

use App\Http\Controllers\TrialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/knights-trial',[TrialController::class,'home'])->name('chase.home');
Route::get('/countdown',[TrialController::class,'showCountdown'])->name('chase.countdown');
