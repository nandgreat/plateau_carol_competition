@extends('layouts.app')

@section('content')
    <style>
        /* --- General Theme --- */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            color: #333;
        }
        .hero {
            background: linear-gradient(to right, #065f46, #10b981, #b91c1c);
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .hero img {
            max-width: 500px;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background: white;
            color: #065f46;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #f9fafb;
        }

        .carousel img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 12px;
        }

        section {
            padding: 80px 20px;
        }

        h2.section-title {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            color: #065f46;
            margin-bottom: 40px;
        }

        .footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 30px 10px;
            font-size: 14px;
        }
    </style>

    {{-- Hero Section --}}
    <section class="hero">
        <img src="{{ asset('images/banner.jpeg') }}" alt="Plateau Christmas Carol Banner">
        <h1 class="text-4xl font-bold mt-4">
            Plateau State Christmas Carol <br>
            Children Bible Quiz & Recitation Competition 2025
        </h1>
        <p class="mt-4 text-lg max-w-2xl mx-auto">
            Celebrating the Word of God through Knowledge, Recitation & Faith in the hearts of children.
        </p>
        <a href="https://plateaukidsquiz.com/register-child" class="btn-primary mt-6 inline-block">Register Now</a>
    </section>

    {{-- Carousel Section --}}
    <section class="bg-gray-50">
        <div id="eventCarousel" class="carousel slide container mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner rounded-lg shadow-lg">
                <div class="carousel-item active">
                    <img src="{{ asset('images/event1.jpg') }}" alt="Preliminary Stage">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Preliminary Stage</h5>
                        <p>8th & 9th November 2025</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/event2.jpg') }}" alt="Semifinal Stage">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Semifinal Stage</h5>
                        <p>15th & 16th November 2025</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/event3.jpg') }}" alt="Grand Finale">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Grand Finale</h5>
                        <p>22nd & 23rd November 2025</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    {{-- Event Details --}}
    <section id="events" class="bg-green-50">
        <h2 class="section-title">Event Details</h2>
        <div class="max-w-3xl mx-auto text-lg leading-relaxed text-center">
            <p class="mb-3">
                The <strong>Plateau State Christmas Carol Children Bible Quiz & Recitation Competition 2025</strong>
                begins with the <strong>Preliminary Stages</strong> on the
                <strong>8th and 9th of November 2025</strong>.
            </p>
            <p>📍 <strong>Jos North:</strong> COCIN LCC Hwolse, Opposite National Library — <strong>9:00 AM</strong></p>
            <p>📍 <strong>Jos South:</strong> ECWA Bukuru, Rayfield — <strong>9:00 AM</strong></p>
            <p class="mt-4">
                <strong>Semifinal:</strong> 15th & 16th November 2025 <br>
                <strong>Grand Finale:</strong> 22nd & 23rd November 2025
            </p>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="bg-white">
        <h2 class="section-title text-red-700">About the Event</h2>
        <p class="max-w-4xl mx-auto text-center text-lg text-gray-700 leading-relaxed">
            The Plateau State Christmas Carol Children Bible Quiz and Recitation Competition is an annual event designed to
            nurture biblical knowledge, confidence, and creativity in children. It’s a celebration of faith, learning, and
            excellence where participants showcase their understanding of the Scriptures through quizzes and recitations.
        </p>
    </section>

    {{-- Successful Candidates --}}
    <section id="candidates" class="bg-gray-50">
        <h2 class="section-title">Successful Candidates</h2>
        <p class="text-center text-gray-600 mb-6">
            Names of qualified participants will appear here after each stage of the event.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <div class="bg-white shadow-md rounded-2xl p-6 text-center">
                <p class="font-semibold">Awaiting publication...</p>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section id="contact" class="bg-green-700 text-white">
        <h2 class="section-title text-white">Contact the Organizers</h2>
        <div class="max-w-3xl mx-auto text-center">
            <p class="mb-2">📞 <strong>+234 703 2033 963</strong></p>
            <p class="mb-2">📧 <strong>support@plateaukidsquiz.com</strong></p>
            <p class="mb-2">
                🌐 <a href="https://plateaukidsquiz.com" class="underline text-white hover:text-gray-200">
                    https://plateaukidsquiz.com
                </a>
            </p>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="footer">
        © 2025 Plateau State Christmas Carol Children Bible Quiz & Recitation Competition. All Rights Reserved.
    </footer>
@endsection
