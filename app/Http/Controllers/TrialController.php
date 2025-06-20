<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Question;
use PDO;

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

    return redirect()->route('chase.start');
    }

    public function start(){
        session([
            'used_trial_question_ids' => [],
            'trail_score' => 0,
            'trial_started_at' => now(),
        ]);
        return redirect()->route('chase.nextQuestion');
    }
    public function nextQuestion($gameType="open_ended"){
        $usedIds = session('used_trail_question_ids',[]);

        $questions = Question::where('type',$gameType)
                    ->whereNotIn('id',$usedIds)
                    ->inRandomOrder()
                    ->first();
        if (!$questions) {
            return response()->json(['message' => 'No more questions available.'], 404);
        }

        
        $data = [
            'id' => $questions->id,
            'question' => $questions->question,
            'type' => $questions->type,
        ];

        if($data['type'] != 'open-ended'){
                        $data['options'] = [
                'a' => $questions->option_a,
                'b' => $questions->option_b,
                'c' => $questions->option_c,
            ];
        }

                $deadline = $this->showCountdown();
        return view('KnightsTrial',compact('deadline','data'));
    }
}
