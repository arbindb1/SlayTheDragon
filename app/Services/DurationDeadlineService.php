<?php

namespace App\Services;

use App\Interfaces\DurationDeadlineServiceInterface;

class DurationDeadlineService implements DurationDeadlineServiceInterface{
    public function getDurationDeadline($duration){
        $deadline = now()->addMinutes(1);
        return $deadline;
    }
}