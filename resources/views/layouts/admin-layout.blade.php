<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Custom scrollbar for sidebar */
        .sidebar-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        /* Animation for mobile menu */
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        
        .mobile-menu-open {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <!-- Mobile Header -->
    <div class="lg:hidden bg-gradient-to-r from-green-800 to-green-700 text-white p-4 flex justify-between items-center shadow-md">
        <div>
            <h1 class="text-xl font-bold">🎄 Plateau Carol</h1>
            <p class="text-xs text-green-200">Admin Dashboard</p>
        </div>
        <button id="mobileMenuToggle" class="text-white focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar for Desktop -->
        <aside class="hidden lg:flex lg:w-72 bg-gradient-to-b from-green-900 via-green-800 to-green-950 text-white flex-col shadow-xl">
            <!-- Brand -->
            <div class="p-6 border-b border-green-700 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight">🎄 Plateau Carol</h2>
                    <p class="text-sm text-green-300">Admin Dashboard</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-5 space-y-2 mt-4 overflow-y-auto sidebar-scrollbar">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 py-3 px-4 rounded-lg text-sm font-semibold transition-all duration-200
                    {{ request()->routeIs('admin.dashboard') 
                        ? 'bg-green-700 text-white shadow-md' 
                        : 'text-green-100 hover:bg-green-800 hover:text-white' }}">
                    <i class="fas fa-home w-5 text-center"></i> Dashboard
                </a>

                <a href="{{ route('admin.participants') }}"
                    class="flex items-center gap-3 py-3 px-4 rounded-lg text-sm font-semibold transition-all duration-200
                    {{ request()->routeIs('admin.participants') 
                        ? 'bg-green-700 text-white shadow-md' 
                        : 'text-green-100 hover:bg-green-800 hover:text-white' }}">
                    <i class="fas fa-users w-5 text-center"></i> Participants
                </a>

                <a href="{{ route('admin.broadcast') }}"
                    class="flex items-center gap-3 py-3 px-4 rounded-lg text-sm font-semibold transition-all duration-200
                    {{ request()->routeIs('admin.broadcast') 
                        ? 'bg-green-700 text-white shadow-md' 
                        : 'text-green-100 hover:bg-green-800 hover:text-white' }}">
                    <i class="fas fa-bullhorn w-5 text-center"></i> Broadcast
                </a>
            </nav>

            <!-- Footer -->
            <div class="p-5 border-t border-green-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-white font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Mobile Sidebar Overlay -->
        <div id="mobileMenuOverlay" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
        
        <!-- Mobile Sidebar -->
        <aside id="mobileSidebar" class="lg:hidden fixed top-0 left-0 h-full w-72 bg-gradient-to-b from-green-900 via-green-800 to-green-950 text-white flex-col shadow-xl z-50 transform -translate-x-full transition-transform duration-300">
            <!-- Brand -->
            <div class="p-6 border-b border-green-700 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight">🎄 Plateau Carol</h2>
                    <p class="text-sm text-green-300">Admin Dashboard</p>
                </div>
                <button id="mobileMenuClose" class="text-white focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-5 space-y-2 mt-4 overflow-y-auto sidebar-scrollbar">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 py-3 px-4 rounded-lg text-sm font-semibold transition-all duration-200
                    {{ request()->routeIs('admin.dashboard') 
                        ? 'bg-green-700 text-white shadow-md' 
                        : 'text-green-100 hover:bg-green-800 hover:text-white' }}">
                    <i class="fas fa-home w-5 text-center"></i> Dashboard
                </a>

                <a href="{{ route('admin.participants') }}"
                    class="flex items-center gap-3 py-3 px-4 rounded-lg text-sm font-semibold transition-all duration-200
                    {{ request()->routeIs('admin.participants') 
                        ? 'bg-green-700 text-white shadow-md' 
                        : 'text-green-100 hover:bg-green-800 hover:text-white' }}">
                    <i class="fas fa-users w-5 text-center"></i> Participants
                </a>

                <a href="{{ route('admin.broadcast') }}"
                    class="flex items-center gap-3 py-3 px-4 rounded-lg text-sm font-semibold transition-all duration-200
                    {{ request()->routeIs('admin.broadcast') 
                        ? 'bg-green-700 text-white shadow-md' 
                        : 'text-green-100 hover:bg-green-800 hover:text-white' }}">
                    <i class="fas fa-bullhorn w-5 text-center"></i> Broadcast
                </a>
            </nav>

            <!-- Footer -->
            <div class="p-5 border-t border-green-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-white font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 min-w-0 bg-gradient-to-br from-gray-50 to-gray-100 p-4 lg:p-10 overflow-y-auto">
            <header class="mb-6 lg:mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-green-900">@yield('page_title')</h1>
                    <p class="text-sm text-gray-500 mt-1">Welcome back, Admin 👋</p>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="h-10 w-10 rounded-full bg-green-700 flex items-center justify-center text-white font-bold shadow-md">
                        A
                    </div>
                </div>
            </header>

            <section class="bg-white rounded-xl lg:rounded-2xl shadow-md p-5 lg:p-8 border border-gray-100">
                @yield('content')
            </section>
        </main>
    </div>

    <script>
        // Mobile menu functionality
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

        function openMobileMenu() {
            mobileSidebar.classList.remove('-translate-x-full');
            mobileMenuOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeMobileMenu() {
            mobileSidebar.classList.add('-translate-x-full');
            mobileMenuOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        mobileMenuToggle.addEventListener('click', openMobileMenu);
        mobileMenuClose.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobileSidebar a').forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Close menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeMobileMenu();
            }
        });
    </script>
</body>
</html>