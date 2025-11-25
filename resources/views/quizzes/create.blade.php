@extends('layouts.app')
@section('title', 'Create Quiz')

@section('content')
<div class="card p-4 shadow" style="max-width: 600px; margin: auto;">
    <h3 class="fw-bold text-success text-center">Create Quiz</h3>

    <form method="POST" action="{{ route('quizzes.store') }}">
        @csrf

        <label class="fw-semibold mt-3">Title</label>
        <input class="form-control" name="title" required>

        <label class="fw-semibold mt-3">Description</label>
        <textarea class="form-control" name="description"></textarea>

        <label class="fw-semibold mt-3">Assign to Subject</label>
        <select class="form-control" name="subject_id">
            <option value="">None</option>
            @foreach($subjects as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>

        <label class="fw-semibold mt-3">Deadline</label>
        <input type="datetime-local" class="form-control" name="deadline">

        <button class="btn btn-success w-100 mt-3">Create</button>
    </form>
</div>
@endsection
