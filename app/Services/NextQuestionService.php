<?php 

namespace App\Services;

use App\Interfaces\NextQuestionServiceInterface;
use App\Interfaces\TrialRepositoryInterface;

class NextQuestionService implements NextQuestionServiceInterface{
    protected TrialRepositoryInterface $trialRepository;

    public function __construct(TrialRepositoryInterface $trialRepository)
    {
        $this->trialRepository = $trialRepository;
    }

    public function setupTrialRound($gameType)
    {
        $usedIds = session('used_trail_question_ids',[]);
        $question = $this->trialRepository->getRandomQuestionByTypeAndId($gameType,$usedIds);
        if (!$question) {
            return response()->json(['message' => 'No more questions available.'], 404);
        }

        
        $data = [
            'id' => $question->id,
            'question' => $question->question,
            'type' => $question->type,
        ];

        if($data['type'] != 'open-ended'){
                        $data['options'] = [
                'a' => $question->option_a,
                'b' => $question->option_b,
                'c' => $question->option_c,
            ];
        }
        return $data;
    }
}