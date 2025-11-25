@extends('layouts.app')
@section('title', 'My Scores')

@section('content')
<h2 class="fw-bold text-success">My Scores</h2>

<table class="table table-striped mt-3">
    <thead>
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
@endsection
