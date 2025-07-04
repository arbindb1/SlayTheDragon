<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TrialController;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/',function(){
    return view('Homepage');
});
Route::get('/knights-trial',[TrialController::class,'home'])->name('chase.home');
Route::get('/countdown',[TrialController::class,'showCountdown'])->name('chase.countdown');
Route::get('/play',[TrialController::class,'play'])->name('chase.play');
Route::post('/storeUserData',[PlayerController::class,'storeUserData'])->name('chase.userDetail');
Route::get('/start',[TrialController::class,'start'])->name('chase.start');
Route::get('/nextQuestion',[TrialController::class,'nextQuestion'])->name('chase.nextQuestion');

