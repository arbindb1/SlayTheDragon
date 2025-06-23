<?php

namespace App\Interfaces;

interface TrialRepositoryInterface{
    public function getRandomQuestionByTypeAndId($type,$id);
    public function storePlayerInfo($name,$email);
}