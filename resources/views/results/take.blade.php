@extends('layouts.app')
@section('title', 'Take Quiz')

@section('content')
<h2 class="fw-bold text-success">{{ $quiz->title }}</h2>

<form method="POST" action="{{ route('results.store') }}">
@csrf

<input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

@foreach($quiz->questions as $question)
<div class="card shadow mb-3 p-3">
    <p class="fw-bold">{{ $question->question_text }}</p>

    @foreach(['A','B','C','D'] as $opt)
    <div>
        <input type="radio"
               name="answers[{{ $question->id }}]"
               value="{{ $opt }}"
               required>
        {{ $opt }}. {{ $question->{'option_'.strtolower($opt)} }}
    </div>
    @endforeach

</div>
@endforeach

<button class="btn btn-success w-100">Submit Quiz</button>
</form>
@endsection
