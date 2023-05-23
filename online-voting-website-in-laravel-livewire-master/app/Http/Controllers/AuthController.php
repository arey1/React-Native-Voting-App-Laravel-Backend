<?php

namespace App\Http\Controllers;


use App\Models\Condidate;
use App\Models\User;
use App\Models\Votes;
use App\Models\Position;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function login(Request $request){

        $user=$this->validate($request,[
            'vote_id' => 'required',
            'password' => 'required',
        ]);

        if(!Auth::attempt($user)){

            return response()->json(
                ['errors' => ['message' => 'you entered invalid ID or password']],422);
            
        }

        $user= Auth::user();

        $token= auth()->user()->createToken('laravel_reacnative_login')->plainTextToken;

        return response()->json([
            'user'=>$user,
            'token'=>$token
        ]);
    }


      public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(
             ['message' => 'log out!!!']);
      }

      public function profile(){
        return response()->json(
             ['data' => auth()->user()]);
      }




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
    

    $users = User::findOrFail(Auth::user()->id);
    $users->vote_limit = 0;
    $users->voted = true;
    $users->save();

    // Increment the candidate's points by 1
    $candidate->increment('points');

    return response()->json(['success' => true]);
    }


}

    

