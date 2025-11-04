<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Login')</title>

    {{-- Laravel Breeze Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'Nunito', sans-serif;
        }
        .auth-card {
            background: #fff;
            color: #333;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }
        .auth-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .auth-logo img {
            width: 80px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="auth-card">
        <div class="auth-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <h4 class="mt-2">Plateau Carol Admin</h4>
        </div>

        {{-- Main content for login/register pages --}}
        @yield('content')

        <div class="text-center mt-4">
            <small>&copy; {{ date('Y') }} Plateau Carol Competition</small>
        </div>
    </div>
</body>
</html>
