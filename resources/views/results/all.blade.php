@extends('layouts.app')
@section('title', 'All Results')

@section('content')
<h2 class="fw-bold text-success">All Student Results</h2>

<table class="table table-bordered shadow mt-3">
    <thead class="table-success">
        <tr>
            <th>Student</th>
            <th>Quiz</th>
            <th>Score</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($results as $r)
        <tr>
            <td>{{ $r->user->name }}</td>
            <td>{{ $r->quiz->title }}</td>
            <td>{{ $r->score }}</td>
            <td>{{ $r->created_at->format('M d, Y') }}</td>
            <td>
                <a href="{{ route('teacher.viewStudentResults', $r->user->id) }}" 
                   class="btn btn-sm btn-warning text-dark fw-bold">View History</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
