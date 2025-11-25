@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" 
     style="min-height: 100vh; background: linear-gradient(135deg, #006400, #228B22); animation: fadeIn 1s ease;">
    <div class="card shadow-lg p-4 text-center"
         style="width: 420px; border-radius: 15px; animation: slideUp 0.6s ease-out;">

        <img src="{{ asset('images/psau_logo.png') }}"
             alt="PSAU Logo"
             class="mx-auto mb-3"
             style="width: 85px; height: 85px;">

        <h3 class="fw-bold text-success mb-1">Simple Quiz System</h3>
        <h6 class="text-muted mb-4">Pampanga State Agricultural University</h6>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input id="email" type="email" class="form-control" name="email" required autofocus>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <button class="btn w-100 mb-3 text-white"
                    style="background-color: #FFD700; color:#006400; font-weight:bold;">
                Login
            </button>
        </form>

        <div class="my-2 text-muted">— or continue with —</div>

        <!-- Google Login -->
        <a href="{{ route('google.login') }}"
           class="btn w-100 mb-2"
           style="background:#DB4437; color:white; font-weight:bold;">
           <i class="bi bi-google"></i> Login with Google
        </a>

        <!-- Facebook Login -->
        <a href="{{ route('facebook.login') }}"
           class="btn w-100"
           style="background:#1877F2; color:white; font-weight:bold;">
           <i class="bi bi-facebook"></i> Login with Facebook
        </a>

        <div class="text-center mt-3">
            <small>Don't have an account? 
                <a href="{{ route('register') }}" class="text-success fw-bold text-decoration-none">
                    Register
                </a>
            </small>
        </div>

    </div>
</div>

<style>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
@keyframes slideUp {
  from { transform: translateY(40px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}
</style>
@endsection
