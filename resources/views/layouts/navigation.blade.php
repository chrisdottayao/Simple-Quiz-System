<nav class="navbar navbar-expand-lg navbar-light navbar-psau" style="padding:10px 0;">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
      <img src="{{ asset('images/psau_logo.png') }}" class="psau-logo" alt="PSAU logo">
      <div>
        <div class="psau-title">PSAU Simple Quiz</div>
        <div class="psau-sub">Student Project</div>
      </div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#psauNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="psauNav">
      <ul class="navbar-nav ms-auto align-items-center">
        @guest
          <li class="nav-item me-2">
            <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register') }}" class="btn btn-psau">Register</a>
          </li>
        @else
          <li class="nav-item me-2">
            @if(auth()->user()->role === 'teacher')
              <a href="{{ route('teacher.dashboard') }}" class="btn btn-outline-light">Teacher Dashboard</a>
            @else
              <a href="{{ route('student.dashboard') }}" class="btn btn-outline-light">Student Dashboard</a>
            @endif
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('subjects.index') }}">Subjects</a></li>
              <li><a class="dropdown-item" href="{{ route('quizzes.index') }}">Quizzes</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}" class="px-3">
                  @csrf
                  <button class="btn btn-link text-danger">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
