<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Simple Quiz System') — PSAU</title>

  <!-- Bootstrap (keeps things simple for your environment) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* PSAU palette */
    :root{
      --psau-green:#006400;
      --psau-light:#228B22;
      --psau-gold:#FFD700;
      --card-bg: #ffffff;
      --muted: #6c757d;
    }

    /* Page background gradient */
    body{
      background: linear-gradient(135deg, rgba(0,100,0,0.98) 0%, rgba(34,139,34,0.9) 100%);
      min-height:100vh;
      -webkit-font-smoothing:antialiased;
      color:#222;
      font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    /* center layout container for Card UI */
    .center-wrap{
      display:flex;
      align-items:center;
      justify-content:center;
      min-height: calc(100vh - 80px); /* account for navbar */
      padding: 40px 16px;
    }

    /* content card */
    .psau-card{
      background: var(--card-bg);
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.18);
      width:100%;
      max-width: 980px;
      padding: 28px;
      border: 1px solid rgba(0,0,0,0.06);
      animation: cardFade 420ms ease both;
    }

    /* small variant used for forms */
    .psau-card--small{ max-width:720px; }

    /* card header style */
    .psau-brand {
      display:flex;
      align-items:center;
      gap:14px;
    }
    .psau-logo{
      width:56px;
      height:56px;
      object-fit:contain;
      border-radius:8px;
      background: linear-gradient(135deg,var(--psau-gold), #fff8dc);
      padding:8px;
    }
    .psau-title{
      color:var(--psau-green);
      font-weight:700;
      font-size:1.15rem;
    }
    .psau-sub{
      color:var(--muted);
      font-size:0.9rem;
    }

    /* Buttons */
    .btn-psau {
      background: var(--psau-gold);
      color: var(--psau-green);
      font-weight:700;
      border-radius:10px;
      border: none;
    }
    .btn-psau:hover { filter:brightness(.98); }

    /* navbar override */
    .navbar-psau{
      background: rgba(0,0,0,0.06);
      backdrop-filter: blur(6px);
      border-bottom: 1px solid rgba(255,255,255,0.03);
    }

    /* animations */
    @keyframes cardFade{
      from { transform: translateY(10px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    @keyframes fadeIn {
      from{ opacity: 0; } to { opacity: 1; }
    }
    .fade-in { animation: fadeIn .5s ease both; }

    /* small helpers */
    .muted { color: var(--muted); }
    .shadow-soft { box-shadow: 0 6px 18px rgba(0,0,0,0.10); }
    a.text-psau { color: var(--psau-gold); font-weight:700; text-decoration:none; }

    /* responsive */
    @media (max-width:576px){
      .psau-brand .psau-title{ font-size:1rem; }
      .psau-card { padding:18px; }
    }
  </style>

  @stack('head')
</head>

<body>
  @include('layouts.navigation')

  <main>
    @hasSection('center')
      <div class="center-wrap">
        <div class="psau-card psau-card--small">
            @yield('center')
        </div>
      </div>
    @else
      <div class="container py-4">
        <div class="psau-card fade-in">
          @yield('content')
        </div>
      </div>
    @endif
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
