@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="text-center">
    <h1 class="fw-bold text-success">Welcome, {{ auth()->user()->name }}!</h1>
    <p class="text-muted">Role: {{ ucfirst(auth()->user()->role) }}</p>

    <div class="mt-4">
        @if(auth()->user()->role === 'teacher')
            <a href="{{ route('subjects.index') }}" class="btn btn-success mb-2 w-50">My Subjects</a><br>
            <a href="{{ route('quizzes.index') }}" class="btn btn-warning text-dark fw-bold w-50">My Quizzes</a><br>
            <a href="{{ route('results.all') }}" class="btn btn-secondary w-50">All Results</a>

        @else
            <a href="{{ route('subjects.index') }}" class="btn btn-success mb-2 w-50">My Subjects</a><br>
            <a href="{{ route('results.index') }}" class="btn btn-warning text-dark fw-bold w-50">Available Quizzes</a><br>
            <a href="{{ route('results.myScores') }}" class="btn btn-secondary w-50">My Scores</a>
        @endif
    </div>
</div>
@endsection
