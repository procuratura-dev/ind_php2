<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Option;
use App\Models\VoteCast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index(Request $request) {
        $search = $request->query('search');
        $query = Vote::with('options')->orderBy('created_at','desc');
        if($search) {
            $query->where('title','like','%'.$search.'%');
        }
        $votes = $query->get();
        return view('votes.index', compact('votes','search'));
    }

    public function create() {
        return view('votes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'=>'required',
            'options'=>'required|array|min:2',
            'options.*'=>'required|string'
        ]);

        $vote = Vote::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        foreach($request->options as $opt) {
            Option::create([
                'vote_id'=>$vote->id,
                'title'=>$opt
            ]);
        }

        return redirect()->route('votes.index')->with('success','Vote created successfully!');
    }

    public function show(Vote $vote) {
        $vote->load('options');
        return view('votes.show', compact('vote'));
    }

    public function cast(Request $request, Vote $vote) {
        $request->validate([
            'option_id'=>'required|exists:options,id'
        ]);

        // Check if user already voted
        $existing = VoteCast::where('vote_id',$vote->id)->where('user_id',Auth::id())->first();
        if($existing) {
            return back()->with('error','You have already voted!');
        }

        VoteCast::create([
            'vote_id'=>$vote->id,
            'option_id'=>$request->option_id,
            'user_id'=>Auth::id()
        ]);

        return redirect()->route('votes.results',$vote)->with('success','Your vote has been cast!');
    }

    public function results(Vote $vote) {
        $vote->load('options.casts');
        $totalVotes = $vote->casts->count();
        return view('votes.results', compact('vote','totalVotes'));
    }

    public function destroy(Vote $vote) {
        if(Auth::id() !== $vote->user_id && !Auth::user()->is_admin) {
            abort(403);
        }
        $vote->delete();
        return redirect()->route('votes.index')->with('success','Vote deleted successfully!');
    }
}
