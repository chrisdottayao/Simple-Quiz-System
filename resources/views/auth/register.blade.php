@extends('layouts.app')

@section('title', 'Register')

@section('center')
<div class="d-flex justify-content-center align-items-center"
     style="min-height: 100vh; background: linear-gradient(135deg, #006400, #228B22);">

    <div class="card shadow-lg p-4 text-center" 
         style="width: 450px; border-radius: 15px;">        
        <img src="{{ asset('images/psau_logo.png') }}" style="width: 90px;" class="mx-auto mb-3">

        <h3 class="fw-bold text-success">Simple Quiz System</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label class="form-label fw-semibold text-start w-100">Full Name</label>
            <input class="form-control" name="name" required>

            <label class="form-label fw-semibold text-start w-100 mt-3">Email</label>
            <input class="form-control" name="email" type="email" required>

            <label class="form-label fw-semibold text-start w-100 mt-3">Role</label>
            <select class="form-control" name="role">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>

            <label class="form-label fw-semibold text-start w-100 mt-3">Password</label>
            <input class="form-control" name="password" type="password" required>

            <label class="form-label fw-semibold text-start w-100 mt-3">Confirm Password</label>
            <input class="form-control" name="password_confirmation" type="password" required>

            <button class="btn btn-warning text-dark fw-bold w-100 mt-3">Register</button>
        </form>

        <p class="mt-3">
            <a href="{{ route('login') }}" class="text-white fw-bold">Already have an account?</a>
        </p>

    </div>
</div>
@endsection
