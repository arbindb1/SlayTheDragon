<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'correct_answer',
        'type',
    ];

    public function getCorrectAnswerTextAttribute(){
        return $this->{'option_'. $this->correct_option};
    }
}
