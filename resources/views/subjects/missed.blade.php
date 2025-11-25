@extends('layouts.app')
@section('title', 'Missed Deadlines')

@section('content')
<h2 class="fw-bold text-danger">Missed Quiz Deadlines - {{ $subject->name }}</h2>

@if(empty($missed))
    <div class="alert alert-success mt-3">No missed quizzes!</div>
@else
<table class="table table-bordered shadow mt-3">
    <thead class="table-danger">
        <tr>
            <th>Student</th>
            <th>Quiz</th>
            <th>Deadline</th>
        </tr>
    </thead>
    <tbody>
        @foreach($missed as $row)
        <tr>
            <td>{{ $row['student']->name }}</td>
            <td>{{ $row['quiz']->title }}</td>
            <td>{{ $row['quiz']->deadline->format('M d, Y h:i A') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
