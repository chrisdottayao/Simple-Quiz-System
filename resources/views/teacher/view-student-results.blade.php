@extends('layouts.app')
@section('title', 'Student Quiz History')

@section('content')
<h2 class="fw-bold text-success">{{ $user->name }} - Quiz History</h2>

<table class="table table-bordered shadow mt-3">
    <thead class="table-success">
        <tr>
            <th>Quiz</th>
            <th>Score</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        @foreach($results as $r)
        <tr>
            <td>{{ $r->quiz->title }}</td>
            <td>{{ $r->score }}</td>
            <td>{{ $r->created_at->format('M d, Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('results.all') }}" class="btn btn-secondary mt-2">Back</a>
@endsection
