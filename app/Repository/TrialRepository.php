<?php

namespace App\Repository;

use App\Interfaces\TrialRepositoryInterface;
use App\Models\Players;
use App\Models\Question;

class TrialRepository implements TrialRepositoryInterface{
    public function getRandomQuestionByTypeAndId($type,$id){
        return Question::where('type',$type)
                    ->whereNotIn('id',$id)
                    ->inRandomOrder()
                    ->first();
    }
    public function storePlayerInfo($name,$email){
        return Players::create([
        'name' => $name,
        'email' => $email ?? null,
    ]);
    }
}