<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Simple Quiz System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #006400, #228B22);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1.2s ease;
            color: white;
        }
        .welcome-box {
            background: rgba(255,255,255,0.15);
            padding: 40px;
            border-radius: 18px;
            text-align: center;
            backdrop-filter: blur(8px);
            animation: slideUp 0.8s ease-out;
            width: 450px;
        }
        img {
            width: 110px;
            margin-bottom: 15px;
        }
        h1 {
            font-size: 28px;
            font-weight: bold;
        }
        .btn-custom {
            font-weight: bold;
            border-radius: 8px;
        }
        @keyframes fadeIn {
            from { opacity: 0 }
            to { opacity: 1 }
        }
        @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0 }
            to { transform: translateY(0); opacity: 1 }
        }
    </style>
</head>
<body>

    <div class="welcome-box shadow-lg">
        <img src="{{ asset('images/psau_logo.png') }}" alt="PSAU Logo">

        <h1>Simple Quiz System</h1>
        <p class="mt-2 mb-4" style="font-size: 15px;">
            Pampanga State Agricultural University  
            <br>
            <span class="text-warning fw-bold">A lightweight and efficient quiz platform</span>
        </p>

        <a href="{{ route('login') }}" 
           class="btn btn-warning text-dark btn-custom w-100 mb-2">
           Login
        </a>

        <a href="{{ route('register') }}" 
           class="btn btn-light btn-custom w-100">
           Register
        </a>
    </div>

</body>
</html>
