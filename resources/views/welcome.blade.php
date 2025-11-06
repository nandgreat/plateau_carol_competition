<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateau State Christmas Carol Children Bible Quiz & Recitation Competition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a4d2e;
            --secondary-color: #c8a951;
            --accent-color: #d4af37;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
        }
        
        .navbar {
            background-color: var(--primary-color);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
        }
        
        /* Carousel Styles */
        .carousel-section {
            position: relative;
        }
        
        .carousel-item {
            height: 600px;
            background-size: cover;
            background-position: center;
        }
        
        .carousel-caption {
            background: rgba(26, 77, 46, 0.85);
            border-radius: 10px;
            padding: 30px;
            bottom: 80px;
            left: 10%;
            right: 10%;
        }
        
        .carousel-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .carousel-subtitle {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background-color: var(--secondary-color);
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        .bg-light {
            background-color: #f9f9f9 !important;
        }
        
        /* About Section */
        .about-section {
            position: relative;
        }
        
        .about-content {
            position: relative;
            z-index: 2;
        }
        
        .about-feature {
            text-align: center;
            padding: 25px 15px;
            border-radius: 10px;
            transition: transform 0.3s;
            height: 100%;
        }
        
        .about-feature:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }
        
        .event-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .event-card:hover {
            transform: translateY(-5px);
        }
        
        .event-card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
            text-align: center;
            font-weight: 600;
        }
        
        .event-card-body {
            padding: 25px;
        }
        
        .event-date {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .event-location {
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        
        .candidate-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .candidate-card:hover {
            transform: translateY(-5px);
        }
        
        .candidate-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 5px solid var(--secondary-color);
        }
        
        /* Contact Section */
        .contact-section {
            background: linear-gradient(rgba(26, 77, 46, 0.9), rgba(26, 77, 46, 0.9)), url('https://images.unsplash.com/photo-1511895426328-dc8714191300?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
        }
        
        .contact-item {
            text-align: center;
            padding: 30px 20px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s;
            height: 100%;
        }
        
        .contact-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .contact-icon {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.5rem;
        }
        
        /* Registration Section - Parallax CTA */
        .registration-cta {
            position: relative;
            overflow: hidden;
            padding: 120px 0;
            background: linear-gradient(rgba(26, 77, 46, 0.85), rgba(200, 169, 81, 0.8)), url('https://images.unsplash.com/photo-1544966503-504d75594113?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
        }
        
        .registration-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .cta-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .cta-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }
        
        .cta-button {
            background-color: var(--secondary-color);
            border: none;
            color: var(--primary-color);
            padding: 18px 40px;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 50px;
            transition: all 0.4s;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .cta-button:hover {
            background-color: white;
            color: var(--primary-color);
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }
        
        .floating-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }
        
        .floating-icon {
            position: absolute;
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.3);
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }
        
        .floating-icon:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
            animation-duration: 20s;
        }
        
        .floating-icon:nth-child(2) {
            left: 20%;
            animation-delay: 2s;
            animation-duration: 18s;
        }
        
        .floating-icon:nth-child(3) {
            left: 30%;
            animation-delay: 4s;
            animation-duration: 22s;
        }
        
        .floating-icon:nth-child(4) {
            left: 40%;
            animation-delay: 6s;
            animation-duration: 16s;
        }
        
        .floating-icon:nth-child(5) {
            left: 50%;
            animation-delay: 8s;
            animation-duration: 19s;
        }
        
        .floating-icon:nth-child(6) {
            left: 60%;
            animation-delay: 10s;
            animation-duration: 21s;
        }
        
        .floating-icon:nth-child(7) {
            left: 70%;
            animation-delay: 12s;
            animation-duration: 17s;
        }
        
        .floating-icon:nth-child(8) {
            left: 80%;
            animation-delay: 14s;
            animation-duration: 23s;
        }
        
        .floating-icon:nth-child(9) {
            left: 90%;
            animation-delay: 16s;
            animation-duration: 20s;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            margin-right: 20px;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--secondary-color);
        }
        
        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: var(--secondary-color);
        }
        
        @media (max-width: 768px) {
            .carousel-item {
                height: 500px;
            }
            
            .carousel-title {
                font-size: 2rem;
            }
            
            .carousel-subtitle {
                font-size: 1.1rem;
            }
            
            .carousel-caption {
                bottom: 40px;
                padding: 20px;
            }
            
            .cta-title {
                font-size: 2.2rem;
            }
            
            .cta-subtitle {
                font-size: 1.1rem;
            }
            
            .cta-button {
                padding: 15px 30px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-bible me-2"></i>Bible Quiz & Recitation
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#candidates">Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register-child">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel Section -->
    <section id="home" class="carousel-section">
        <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1549056572-75914d6d7e1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="carousel-caption">
                        <h2 class="carousel-title">Plateau State Christmas Carol Children Bible Quiz & Recitation Competition</h2>
                        <p class="carousel-subtitle">Nurturing Faith, Knowledge and Spiritual Growth in Our Children</p>
                        <a href="register-child" class="btn btn-primary btn-lg">Register Now</a>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="carousel-caption">
                        <h2 class="carousel-title">First Stage Competition</h2>
                        <p class="carousel-subtitle">November 8th & 9th, 2025 at COCIN LCC Hwolse & ECWA Unity Church Rayfield</p>
                        <a href="#events" class="btn btn-primary btn-lg">View Schedule</a>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="carousel-caption">
                        <h2 class="carousel-title">Grand Finale</h2>
                        <p class="carousel-subtitle">November 22nd & 23rd, 2025 - Witness the Crowning of Our Bible Champions</p>
                        <a href="#events" class="btn btn-primary btn-lg">Learn More</a>
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

    <!-- About Section -->
    <section id="about" class="section-padding about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title text-center">About the Event</h2>
                    <p class="lead text-center mb-5">The Plateau State Christmas Carol Children Bible Quiz and Recitation Competition is an annual event designed to nurture spiritual growth and biblical knowledge in children across Plateau State.</p>
                    
                    <div class="row mb-5">
                        <div class="col-md-4 mb-4">
                            <div class="about-feature">
                                <div class="feature-icon">
                                    <i class="fas fa-book-bible"></i>
                                </div>
                                <h4>Biblical Literacy</h4>
                                <p>Promoting deeper understanding and knowledge of the Bible among children through engaging quizzes and recitations.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="about-feature">
                                <div class="feature-icon">
                                    <i class="fas fa-hands-praying"></i>
                                </div>
                                <h4>Spiritual Growth</h4>
                                <p>Fostering Christian values and spiritual development in young believers through scripture memorization and application.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="about-feature">
                                <div class="feature-icon">
                                    <i class="fas fa-people-group"></i>
                                </div>
                                <h4>Christian Fellowship</h4>
                                <p>Building connections and fellowship among children from different denominations and backgrounds across Plateau State.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Competition Categories</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Bible Quiz (7-10 years)</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Bible Recitation (11-13 years)</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Senior Category (14-15 years)</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Team Competition (Church Groups)</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Event Highlights</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-star text-primary me-2"></i>Three-stage competition process</li>
                                <li class="mb-2"><i class="fas fa-star text-primary me-2"></i>Professional judging panel</li>
                                <li class="mb-2"><i class="fas fa-star text-primary me-2"></i>Awards and recognition ceremony</li>
                                <li class="mb-2"><i class="fas fa-star text-primary me-2"></i>Special performances and cultural displays</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Details Section -->
    <section id="events" class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title text-center">Event Schedule</h2>
            <p class="text-center mb-5">Mark your calendars for these important dates in the competition</p>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card event-card">
                        <div class="card-header event-card-header">
                            First Stage
                        </div>
                        <div class="card-body event-card-body">
                            <div class="event-date">November 8th & 9th, 2025</div>
                            <div class="event-location">
                                <p><strong>Jos North Participants:</strong><br>COCIN LCC Hwolse</p>
                                <p><strong>Jos South Participants:</strong><br>ECWA Unity Church Rayfield</p>
                            </div>
                            <p class="card-text">The initial stage of the competition where participants showcase their biblical knowledge and recitation skills.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card event-card">
                        <div class="card-header event-card-header">
                            Semi-Final Stage
                        </div>
                        <div class="card-body event-card-body">
                            <div class="event-date">November 15th & 16th, 2025</div>
                            <div class="event-location">
                                <p><strong>Venue:</strong><br>To be announced</p>
                            </div>
                            <p class="card-text">The top performers from the first stage compete for a spot in the grand finale.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card event-card">
                        <div class="card-header event-card-header">
                            Final Stage
                        </div>
                        <div class="card-body event-card-body">
                            <div class="event-date">November 22nd & 23rd, 2025</div>
                            <div class="event-location">
                                <p><strong>Venue:</strong><br>To be announced</p>
                            </div>
                            <p class="card-text">The grand finale where champions will be crowned in each category.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
        <!-- Registration Section - Parallax CTA -->
    <section id="register" class="registration-cta">
        <div class="floating-icons">
            <div class="floating-icon"><i class="fas fa-star"></i></div>
            <div class="floating-icon"><i class="fas fa-heart"></i></div>
            <div class="floating-icon"><i class="fas fa-cross"></i></div>
            <div class="floating-icon"><i class="fas fa-book"></i></div>
            <div class="floating-icon"><i class="fas fa-dove"></i></div>
            <div class="floating-icon"><i class="fas fa-pray"></i></div>
            <div class="floating-icon"><i class="fas fa-church"></i></div>
            <div class="floating-icon"><i class="fas fa-crown"></i></div>
            <div class="floating-icon"><i class="fas fa-award"></i></div>
        </div>
        
        <div class="container">
            <div class="registration-content">
                <h2 class="cta-title">Register Your Child Today!</h2>
                <p class="cta-subtitle">Don't miss this opportunity for your child to participate in this enriching spiritual experience. Join hundreds of children from across Plateau State in celebrating faith, knowledge, and fellowship through biblical quizzes and recitations.</p>
                
                <a href="/register-child" target="_blank" class="cta-button">
                    <i class="fas fa-pencil-alt"></i> Register Now
                </a>
                
                <p class="mt-4">Registration closes on November 5th, 2025</p>
            </div>
        </div>
    </section>

    <!-- Successful Candidates Section -->
    <section id="candidates" class="section-padding">
        <div class="container">
            <h2 class="section-title text-center">Our Successful Candidates</h2>
            <p class="text-center mb-5">Meet some of our past winners and participants</p>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="candidate-card">
                        <img src="https://images.unsplash.com/photo-1596492784531-6e6eb5ea9993?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Candidate" class="candidate-img">
                        <h4>Grace Williams</h4>
                        <p class="text-primary">2024 Bible Quiz Champion</p>
                        <p>Age 12, from COCIN Church</p>
                        <p>"This competition helped me understand the Bible better and make new friends."</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="candidate-card">
                        <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" alt="Candidate" class="candidate-img">
                        <h4>David Johnson</h4>
                        <p class="text-primary">2024 Recitation Champion</p>
                        <p>Age 10, from ECWA Church</p>
                        <p>"I loved memorizing and reciting Bible verses. It brought the stories to life for me."</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="candidate-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Candidate" class="candidate-img">
                        <h4>Sarah Mohammed</h4>
                        <p class="text-primary">2023 Overall Winner</p>
                        <p>Age 14, from St. Peter's Church</p>
                        <p>"The competition boosted my confidence and deepened my faith in God."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Contact Section -->
    <section id="contact" class="section-padding contact-section">
        <div class="container">
            <h2 class="section-title text-center text-white">Contact Us</h2>
            <p class="text-center mb-5 text-white">Get in touch with the organizers for any inquiries</p>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Office Address</h4>
                        <p>Plateau State Christian Association of Nigeria (CAN) Secretariat,<br>Jos, Plateau State</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Phone Numbers</h4>
                        <p>+234 803 123 4567<br>+234 805 765 4321</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email Address</h4>
                        <p>info@plateaubiblequiz.org<br>support@plateaubiblequiz.org</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Plateau State Christmas Carol Children Bible Quiz & Recitation Competition</h4>
                    <p>Nurturing the next generation of Christian leaders through biblical knowledge and spiritual growth.</p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <div class="footer-links d-flex flex-column">
                        <a href="#home">Home</a>
                        <a href="#about">About</a>
                        <a href="#events">Events</a>
                        <a href="#register">Register</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-3" style="border-color: rgba(255,255,255,0.1);">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2025 Plateau State Christmas Carol Children Bible Quiz & Recitation Competition. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Initialize carousel
        var myCarousel = document.querySelector('#eventCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            wrap: true
        })
        
    </script>
</body>
</html>