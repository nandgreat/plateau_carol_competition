<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Details</title>

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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Profile & Basic Info -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Profile Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="text-center">
                    <div class="mb-4">
                        <img src="{{ asset($participant->child_image_path) }}"
                            alt="{{ $participant->fullname }}"
                            class="h-32 w-32 rounded-full object-cover border-4 border-green-100 shadow-lg mx-auto"
                            onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($participant->fullname) }}&background=random&size=128'">
                    </div>

                    <h2 class="text-xl font-bold text-gray-900 mb-1">{{ $participant->fullname }}</h2>
                    <p class="text-green-700 font-medium mb-3">{{ $participant->unique_code }}</p>

                    <div class="flex justify-center space-x-2 mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $participant->age }} years
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                        {{ strtolower($participant->gender) == 'male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                            <i class="fas {{ strtolower($participant->gender) == 'male' ? 'fa-mars' : 'fa-venus' }} mr-1"></i>
                            {{ $participant->gender }}
                        </span>
                    </div>
                    <div class="row">
                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Interest Area</h4>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ $participant->interest_area ?? 'Not specified' }}
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-orange-800">
                                {{ $participant->stage ?? 'Not specified' }}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="border-t border-gray-200 pt-4 mt-4">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="text-center">
                            <p class="text-gray-500">Registration Date</p>
                            <p class="font-medium text-gray-900">{{ $participant->created_at->format('M j, Y') }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-500">Last Updated</p>
                            <p class="font-medium text-gray-900">{{ $participant->updated_at->format('M j, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QR Code Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-qrcode text-green-600 mr-2"></i>
                    Registration QR Code
                </h3>

                <div class="text-center">
                    @if($participant->qr_code_path)
                    <img src="{{ asset($participant->qr_code_path) }}"
                        alt="QR Code"
                        class="h-48 w-48 mx-auto border border-gray-300 rounded-lg shadow-sm"
                        onerror="this.style.display='none'">
                    @else
                    <div class="h-48 w-48 mx-auto border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500 text-sm">No QR Code Generated</p>
                    </div>
                    @endif

                    <p class="text-xs text-gray-500 mt-3">Scan for registration verification</p>

                    <button class="mt-3 bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                        <i class="fas fa-download mr-2"></i>
                        Download QR Code
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Column - Detailed Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user-circle text-green-600 mr-2"></i>
                    Personal Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Full Name</label>
                            <p class="text-gray-900 font-medium">{{ $participant->fullname }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Organization</label>
                            <p class="text-gray-900">{{ $participant->organization ?? 'Not specified' }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Local Government Area</label>
                            <p class="text-gray-900">{{ $participant->lga ?? 'Not specified' }}</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Age</label>
                            <p class="text-gray-900">{{ $participant->age }} years old</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Gender</label>
                            <p class="text-gray-900">{{ $participant->gender }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Interest Area</label>
                            <p class="text-gray-900">{{ $participant->interest_area ?? 'Not specified' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parent/Guardian Information Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-users text-blue-600 mr-2"></i>
                    Parent/Guardian Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Full Name</label>
                            <p class="text-gray-900 font-medium">{{ $participant->parent_name ?? 'Not specified' }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Email Address</label>
                            <p class="text-gray-900">{{ $participant->parent_email ?? 'Not specified' }}</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Phone Number</label>
                            <p class="text-gray-900">{{ $participant->parent_phone ?? 'Not specified' }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-500 block mb-1">Contact Preference</label>
                            <p class="text-gray-900">
                                @if($participant->parent_email && $participant->parent_phone)
                                Email & Phone
                                @elseif($participant->parent_email)
                                Email
                                @elseif($participant->parent_phone)
                                Phone
                                @else
                                Not specified
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Move Participant</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to move <strong>{{ $participant->fullname }}</strong> to the next stage? This action cannot be undone.
                    </p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="deleteConfirm" class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gree-700 focus:outline-none focus:ring-2 focus:ring-red-300 transition-colors">
                        Yes, Move Participant
                    </button>
                    <button id="deleteCancel" class="mt-2 px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteUrl = '';

        function confirmDelete(url) {
            deleteUrl = url;
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');

            document.getElementById('deleteConfirm').onclick = function() {
                window.location.href = deleteUrl;
            };

            document.getElementById('deleteCancel').onclick = function() {
                modal.classList.add('hidden');
            };

            // Close modal when clicking outside
            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            };
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('deleteModal').classList.add('hidden');
            }
        });
    </script>
</body>

</html>