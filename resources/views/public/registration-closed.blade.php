<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Closed - Plateau Carol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
            min-height: 100vh;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-pulse-slow {
            animation: pulse 4s ease-in-out infinite;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="antialiased">
    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-32 w-80 h-80 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"></div>
        <div class="absolute -bottom-40 -left-32 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow animation-delay-4000"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="animate-float mb-6">
                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-calendar-times text-white text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-3">Registration Closed</h1>
                <p class="text-lg text-gray-600">Thank you for your interest in Plateau Carol Event</p>
            </div>

            <!-- Main Card -->
            <div class="glass-effect rounded-2xl shadow-xl p-8 mb-8">
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-lock text-red-600 text-2xl"></i>
                    </div>
                    
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Registration Period Has Ended</h2>
                    
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        We're no longer accepting new registrations for the Plateau Carol Event. 
                        The registration deadline has passed, and we're now preparing for the event.
                    </p>

                    <!-- Event Details -->
                    <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6 mb-6 border border-green-100">
                        <h3 class="font-semibold text-green-900 mb-3 flex items-center justify-center gap-2">
                            <i class="fas fa-info-circle"></i>
                            Event Information
                        </h3>
                        <div class="space-y-3 text-left">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Event Date:</span>
                                <span class="font-semibold text-green-900">8th - 9th November 2025</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                    Finalizing Preparations
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-3 flex items-center justify-center gap-2">
                            <i class="fas fa-headset"></i>
                            Need Assistance?
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            If you have questions about existing registrations or need support, 
                            please contact our event team.
                        </p>
                        <div class="space-y-2">
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <i class="fas fa-envelope text-green-600"></i>
                                <span>events@plateaucarol.org</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <i class="fas fa-phone text-green-600"></i>
                                <span>+234 800 000 0000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ url('/') }}" 
                   class="flex-1 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                    <i class="fas fa-home"></i>
                    Return Home
                </a>
                <button onclick="window.print()" 
                        class="flex-1 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                    <i class="fas fa-print"></i>
                    Print Page
                </button>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <div class="flex items-center justify-center gap-2 text-gray-500 mb-2">
                    <i class="fas fa-tree"></i>
                    <span class="font-semibold">Plateau Carol Event</span>
                </div>
                <p class="text-sm text-gray-500">Bringing Christmas joy to the heart of Plateau State</p>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="fixed bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 via-blue-500 to-purple-500"></div>

    <script>
        // Add some interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.glass-effect');
            
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>