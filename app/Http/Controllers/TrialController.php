<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrialController extends Controller
{
    public function home(){
        $deadline = $this->showCountdown();
        return view('KnightsTrial',compact('deadline'));
    }
    public function showCountdown(){
        $deadline = now()->addMinutes(1);
        return $deadline;
    }
}
