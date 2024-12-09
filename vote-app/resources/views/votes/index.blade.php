@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Votes</h1>
    <a href="{{ route('votes.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create New Vote</a>
</div>

<form action="{{ route('votes.index') }}" method="get" class="mb-4">
    <input type="text" name="search" placeholder="Search votes..." value="{{ $search }}" class="border p-2 rounded">
    <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded">Search</button>
</form>

@foreach($votes as $vote)
<div class="bg-white p-4 rounded mb-4 shadow">
    <h2 class="text-xl font-bold">{{ $vote->title }}</h2>
    <p class="text-gray-600">{{ $vote->description }}</p>
    <p class="text-sm text-gray-500">Created on {{ $vote->created_at->format('F d, Y') }}</p>
    <div class="mt-4">
        @foreach($vote->options as $option)
            <p class="border p-2 rounded mb-2">{{ $option->title }}</p>
        @endforeach
    </div>
    <div class="flex items-center space-x-4 mt-2">
        <a href="{{ route('votes.show',$vote) }}" class="text-blue-500">Vote</a>
        <a href="{{ route('votes.results',$vote) }}" class="text-blue-500">View Results</a>
        @if(auth()->id() == $vote->user_id || (auth()->user() && auth()->user()->is_admin))
            <form action="{{ route('votes.destroy',$vote) }}" method="post" class="inline">
                @csrf
                @method('delete')
                <button class="text-red-500">Delete</button>
            </form>
        @endif
    </div>
</div>
@endforeach
@endsection
