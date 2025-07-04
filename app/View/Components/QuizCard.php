<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuizCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $question;
    public $action;
    public $buttonValue;
    public $deadline;
    public $roundName;

    public function __construct($question,$action,$buttonValue,$deadline,$roundName)
    {
        $this->question = $question;
        $this->action = $action;
        $this->buttonValue = $buttonValue;
        $this->deadline = $deadline;
        $this->roundName = $roundName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.quiz-card');
    }
}
