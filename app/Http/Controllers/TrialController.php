<?php

namespace App\Http\Controllers;

use App\Interfaces\DurationDeadlineServiceInterface;
use App\Interfaces\NextQuestionServiceInterface;
use App\Interfaces\StartTrialServiceInterface;

class TrialController extends Controller
{
    protected NextQuestionServiceInterface $nextQuestionService;
    protected StartTrialServiceInterface $startTrialService;
    protected DurationDeadlineServiceInterface $durationDeadlineService;
    public function __construct(NextQuestionServiceInterface $nextQuestionService,StartTrialServiceInterface $startTrialService, DurationDeadlineServiceInterface $durationDeadlineService)
    {
        $this->nextQuestionService = $nextQuestionService;
        $this->startTrialService = $startTrialService;
        $this->durationDeadlineService = $durationDeadlineService;
    }
    public function play(){
        return view('play');
    }
    public function start(){
        $this->startTrialService->sessionIni();
        return redirect()->route('chase.nextQuestion');
    }
    public function nextQuestion($gameType="open_ended"){

        $data = $this->nextQuestionService->setupTrialRound($gameType);
        $deadline = $this->durationDeadlineService->getDurationDeadline(1);
        return view('KnightsTrial',compact('deadline','data'));
    }
}
