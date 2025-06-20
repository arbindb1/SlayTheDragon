<?php

namespace App\Http\Controllers;

use App\Models\Player;
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
    public function play(){
        return view('play');
    }
    public function storeUserData(Request $request){
            $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|unique:players,email',
    ]);

    $player = Player::create([
        'name' => $validated['name'],
        'email' => $validated['email'] ?? null,
    ]);
    }
}
