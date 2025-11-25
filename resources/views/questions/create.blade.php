@extends('layouts.app')
@section('title', 'Add Question')

@section('content')
<div class="card shadow p-4" style="max-width: 600px; margin:auto;">
    <h3 class="fw-bold text-success text-center">Add Question</h3>

    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

        <label class="fw-semibold mt-3">Question Text</label>
        <textarea class="form-control" name="question_text" required></textarea>

        <label class="fw-semibold mt-3">Option A</label>
        <input class="form-control" name="option_a" required>

        <label class="fw-semibold mt-3">Option B</label>
        <input class="form-control" name="option_b" required>

        <label class="fw-semibold mt-3">Option C</label>
        <input class="form-control" name="option_c" required>

        <label class="fw-semibold mt-3">Option D</label>
        <input class="form-control" name="option_d" required>

        <label class="fw-semibold mt-3">Correct Option</label>
        <select class="form-control" name="correct_option" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>

        <button class="btn btn-success w-100 mt-3">Add Question</button>
    </form>
</div>
@endsection
