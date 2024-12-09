@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Admin Panel</h1>

<ul class="flex space-x-4 mb-8">
    <li><a href="{{ route('admin.index') }}" class="text-blue-500">Statistics</a></li>
    <li><a href="{{ route('admin.users') }}" class="text-blue-500">Users</a></li>
    <li><a href="{{ route('admin.votes') }}" class="text-blue-500">Votes</a></li>
</ul>

<div class="grid grid-cols-4 gap-4 mb-8">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold">Total Users</h2>
        <p class="text-2xl">{{ $totalUsers }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold">Total Votes</h2>
        <p class="text-2xl">{{ $totalVotes }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold">Active Votes</h2>
        <p class="text-2xl">{{ $activeVotes }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold">Total Votes Cast</h2>
        <p class="text-2xl">{{ $totalVotesCast }}</p>
    </div>
</div>
@endsection
