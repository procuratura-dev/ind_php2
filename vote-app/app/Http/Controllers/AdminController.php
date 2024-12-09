<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\VoteCast;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalUsers = User::count();
        $totalVotes = Vote::count();
        $totalVotesCast = VoteCast::count();
        $activeVotes = Vote::count(); // For simplicity, consider all as active
        return view('admin.index', compact('totalUsers','totalVotes','totalVotesCast','activeVotes'));
    }

    public function users() {
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function votes() {
        $votes = Vote::with('options')->get();
        return view('admin.votes', compact('votes'));
    }
}
