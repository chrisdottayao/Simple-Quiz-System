@extends('layouts.app')
@section('title', 'Edit Quiz')

@section('content')
<div class="card p-4 shadow" style="max-width: 600px; margin: auto;">
    <h3 class="fw-bold text-success text-center">Edit Quiz</h3>

    <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
        @csrf
        @method('PUT')

        <label class="fw-semibold mt-3">Title</label>
        <input class="form-control" name="title" value="{{ $quiz->title }}" required>

        <label class="fw-semibold mt-3">Description</label>
        <textarea class="form-control" name="description">{{ $quiz->description }}</textarea>

        <label class="fw-semibold mt-3">Subject</label>
        <select class="form-control" name="subject_id">
            <option value="">None</option>
            @foreach($subjects as $s)
                <option value="{{ $s->id }}" @if($quiz->subject_id == $s->id) selected @endif>
                    {{ $s->name }}
                </option>
            @endforeach
        </select>

        <label class="fw-semibold mt-3">Deadline</label>
        <input type="datetime-local" class="form-control" name="deadline"
               value="{{ $quiz->deadline ? $quiz->deadline->format('Y-m-d\TH:i') : '' }}">

        <button class="btn btn-warning text-dark fw-bold w-100 mt-3">Save Changes</button>
    </form>
</div>
@endsection
