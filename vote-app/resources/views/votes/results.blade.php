@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $vote->title }} - Results</h1>
<p>Total votes: {{ $totalVotes }}</p>

<canvas id="resultsChart" width="400" height="200"></canvas>
<a href="{{ route('votes.index') }}" class="text-blue-500 mt-4 inline-block">&larr; Back to votes</a>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('resultsChart').getContext('2d');
    const data = {
        labels: @json($vote->options->pluck('title')->toArray()),
        datasets: [{
            label: 'Number of Votes',
            data: @json($vote->options->map(fn($opt)=>$opt->casts->count())->toArray()),
            backgroundColor: 'rgba(54, 162, 235, 0.8)'
        }]
    };

    const chart = new Chart(ctx, {
        type: 'bar',
        data: data
    });
</script>
@endsection
