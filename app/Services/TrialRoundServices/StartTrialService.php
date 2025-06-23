<?php

namespace App\Services\TrialRoundServices;

use App\Interfaces\StartTrialServiceInterface;

class StartTrialService implements StartTrialServiceInterface{
    public function sessionIni(){
            session([
            'used_trial_question_ids' => [],
            'trail_score' => 0,
            'trial_started_at' => now(),
        ]);
    }
}