<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Authentication')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
        .auth-card {
            background: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="auth-container">
        <div class="auth-card" style="background-color: pink;">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-16 h-16 mb-2">
                <h2 class="text-lg font-semibold text-gray-700">{{ config('app.name', 'Laravel') }}</h2>
            </div>

            {{-- Main content (form, etc.) --}}
            @yield('content')

            <div class="mt-6 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Plateau Carol Competition
            </div>
        </div>
    </div>
</body>
</html>
