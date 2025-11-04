<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful 🎉</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f8fafc;
            /* off-white background */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Figtree', sans-serif;
            color: #1f2937;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 1rem;
            padding: 3rem 4rem;
            text-align: center;
            width: 100%;
            max-width: 800px;
            /* wider card */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.08) 0%, rgba(6, 182, 212, 0.03) 100%);
            animation: rotate 15s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .lottie {
            height: 180px;
            margin: 0 auto 1rem;
        }

        .btn {
            margin-top: 2rem;
            background: linear-gradient(to right, #4f46e5, #06b6d4);
            color: white;
            padding: 0.9rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(to right, #4338ca, #0891b2);
        }

        .logo {
            width: 90px;
            height: 90px;
            margin: 0 auto 1rem;
            object-fit: contain;
        }

        h2 {
            color: #111827;
        }

        p {
            color: #4b5563;
        }
    </style>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
    <div class="card">
        <lottie-player
            src="https://assets9.lottiefiles.com/packages/lf20_jbrw3hcz.json"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px; margin:auto;"
            loop
            autoplay>
        </lottie-player>

        <h2 class="text-3xl font-bold mb-3">Registration Successful 🎉</h2>
        <p class="text-lg">Thank you for registering for the <span class="font-semibold">2025 Plateau Christmas Carol Children Bible Quiz and Recitation Competition!</span></p>
        <p class="text-lg" style="margin-top: 15px">Kindly check your email, for confirmation email has been sent to you</p>

        <a href="{{ route('register.child') }}" class="btn">Register Another Child</a>
    </div>
</body>

</html>