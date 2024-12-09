@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">All Votes</h1>
@foreach($votes as $vote)
<div class="bg-white p-4 rounded mb-4 shadow">
    <h2 class="text-xl font-bold">{{ $vote->title }}</h2>
    <p class="text-gray-600">{{ $vote->description }}</p>
    <p class="text-sm text-gray-500">Created on {{ $vote->created_at->format('F d, Y') }}</p>
    <ul class="list-disc ml-6 mt-2">
        @foreach($vote->options as $option)
        <li>{{ $option->title }}</li>
        @endforeach
    </ul>
</div>
@endforeach
@endsection
