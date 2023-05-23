<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Votes;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function getCandidates()
    {
        $candidates = Condidate::with('positions')->get();
        $user = Auth::user();

        $candidates = $candidates->map(function($candidate) use ($user) {
            $isVoted = Votes::where(['user_id' => $user->id, 'con_id' => $candidate->id])->first();
            $candidate->isVoted = $isVoted ? true : false;
            return $candidate;
        });

        return response()->json($candidates);
    }


    public function submitVote(Request $request)
    {
        $user = Auth::user();

        //$candidate = decrypt($request->input('con_id'));


        if ($user->voted) {
            return response()->json(['error' => 'You have already voted.'], 401);
        }

        // Check if user has any votes remaining
      if ($user->vote_limit <= 0) {
        return response()->json(['error' => 'You have no votes remaining.'], 401);
        }





    $candidate = Condidate::find($request->input('con_id'));

    

    $vote = new Votes();
    $vote->user_id = $user->id;
    $vote->con_id = $candidate->id;
    $vote->save();

/*
    $votes = Votes::all();
    foreach ($votes as $vote) {
        $vote->con_id = Crypt::decrypt($vote->con_id);
        $vote->user_id = Crypt::decrypt($vote->user_id);
    }*/

        $users = User::findOrFail(Auth::user()->id);
        $users->vote_limit = 0;
        $users->voted = true;
        $users->save();

    // Increment the candidate's points by 1
    $candidate->increment('points');

    return response()->json(['success' => true]);
    }
    
    

    
}