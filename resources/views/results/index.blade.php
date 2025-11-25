@extends('layouts.app')
@section('title', 'Available Quizzes')

@section('content')
<h2 class="fw-bold text-success">Available Quizzes</h2>

<div class="row mt-3">
@foreach($quizzes as $quiz)
    <div class="col-md-4">
        <div class="card shadow mb-3">
            <div class="card-body">
                <h4 class="fw-bold">{{ $quiz->title }}</h4>

                @if($quiz->subject)
                    <span class="badge bg-success">{{ $quiz->subject->name }}</span>
                @endif

                <p class="text-muted mt-2">{{ $quiz->description }}</p>

                <a href="{{ route('results.show', $quiz->id) }}" class="btn btn-primary w-100">Take Quiz</a>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
