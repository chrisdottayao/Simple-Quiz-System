@extends('layouts.app')
@section('title', 'Subjects')

@section('content')
<h2 class="fw-bold text-success mb-3">Subjects</h2>

<div class="mb-3">
    @if(auth()->user()->role === 'teacher')
        <a href="{{ route('subjects.create') }}" class="btn btn-success">+ Create Subject</a>
    @else
        <a href="{{ route('subjects.joinForm') }}" class="btn btn-warning text-dark fw-bold">Join Subject</a>
    @endif
</div>

<div class="row">
    @foreach($subjects as $subject)
    <div class="col-md-4">
        <div class="card shadow mb-3">
            <div class="card-body">
                <h4 class="fw-bold text-success">{{ $subject->name }}</h4>
                <p class="text-muted">{{ $subject->description }}</p>

                <p><strong>Code:</strong> {{ $subject->code }}</p>

                @if(auth()->user()->role === 'teacher')
                    <a href="{{ route('subjects.missed', $subject->id) }}" class="btn btn-danger btn-sm">
                        Missed Deadlines
                    </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
