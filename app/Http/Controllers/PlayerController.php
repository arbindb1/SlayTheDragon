<?php

namespace App\Http\Controllers;

use App\Interfaces\TrialRepositoryInterface;
use App\Models\PlayerModel;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    protected TrialRepositoryInterface $trialRepository;

    public function __construct(TrialRepositoryInterface $trialRepository)
    {
        $this->trialRepository = $trialRepository;
    }

    public function storeUserData(Request $request){
            $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|unique:players,email',
    ]);

    $this->trialRepository->storePlayerInfo($validated['name'],$validated['email']);

    return redirect()->route('chase.start');
    }
}
