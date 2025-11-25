@extends('layouts.app')
@section('title', $quiz->title)

@section('content')
<h2 class="fw-bold text-success">{{ $quiz->title }}</h2>
<p>{{ $quiz->description }}</p>

@if($quiz->deadline)
<p><strong>Deadline:</strong> {{ $quiz->deadline->format('M d, Y h:i A') }}</p>
@endif

@if(auth()->user()->role === 'teacher')
    <a href="{{ route('questions.create', ['quiz' => $quiz->id]) }}" class="btn btn-success">+ Add Question</a>
    <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-warning text-dark fw-bold">Edit Quiz</a>
@endif

@if(auth()->user()->role === 'student')
    <a href="{{ route('results.show', $quiz->id) }}" class="btn btn-primary w-100 mt-3">Take Quiz</a>
@endif

<hr>

<h4 class="mt-4">Questions</h4>
<ul>
    @foreach($quiz->questions as $q)
        <li>{{ $q->question_text }}</li>
    @endforeach
</ul>
@endsection
