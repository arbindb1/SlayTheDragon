<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class playButton extends Component
{
    public $buttonName;
    public $action;
    public function __construct($buttonName,$action)
    {
        $this->buttonName = $buttonName;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.play-button');
    }
}
