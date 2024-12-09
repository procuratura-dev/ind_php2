@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $vote->title }}</h1>
<p class="mb-4">{{ $vote->description }}</p>

<form action="{{ route('votes.cast',$vote) }}" method="post">
    @csrf
    @foreach($vote->options as $option)
        <div class="mb-2">
            <label>
                <input type="radio" name="option_id" value="{{ $option->id }}" required> {{ $option->title }}
            </label>
        </div>
    @endforeach
    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit Vote</button>
</form>
@endsection
