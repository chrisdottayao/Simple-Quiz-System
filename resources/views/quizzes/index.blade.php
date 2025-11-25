@extends('layouts.app')
@section('title', 'Quizzes')

@section('content')
<h2 class="fw-bold text-success mb-3">Quizzes</h2>

@if(auth()->user()->role === 'teacher')
    <a href="{{ route('quizzes.create') }}" class="btn btn-success mb-3">+ Create Quiz</a>
@endif

<div class="row">
    @foreach($quizzes as $quiz)
    <div class="col-md-4">
        <div class="card shadow mb-3">
            <div class="card-body">
                <h4 class="fw-bold">{{ $quiz->title }}</h4>

                @if($quiz->subject)
                    <span class="badge bg-success">{{ $quiz->subject->name }}</span>
                @endif

                <p class="text-muted mt-2">{{ $quiz->description }}</p>

                @if($quiz->deadline)
                    <p><strong>Deadline:</strong> {{ $quiz->deadline->format('M d, Y h:i A') }}</p>
                @endif

                <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-primary w-100">View Quiz</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
