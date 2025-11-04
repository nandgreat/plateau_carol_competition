<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-green-900 text-white flex flex-col shadow-lg">
            <div class="p-6 border-b border-green-800">
                <h2 class="text-2xl font-extrabold tracking-wide">🎄 Plateau Carol</h2>
                <p class="text-sm text-green-300">Admin Portal</p>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-2 py-2.5 px-4 rounded-lg font-medium transition 
                   hover:bg-green-700 hover:text-white
                   {{ request()->routeIs('admin.dashboard') ? 'bg-green-700 text-white' : 'text-green-100' }}">
                   🏠 <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.participants') }}" 
                   class="flex items-center gap-2 py-2.5 px-4 rounded-lg font-medium transition 
                   hover:bg-green-700 hover:text-white
                   {{ request()->routeIs('admin.participants') ? 'bg-green-700 text-white' : 'text-green-100' }}">
                   👩‍👩‍👧 <span>Participants</span>
                </a>

                <a href="{{ route('admin.broadcast') }}" 
                   class="flex items-center gap-2 py-2.5 px-4 rounded-lg font-medium transition 
                   hover:bg-green-700 hover:text-white
                   {{ request()->routeIs('admin.broadcast') ? 'bg-green-700 text-white' : 'text-green-100' }}">
                   📢 <span>Broadcast</span>
                </a>
            </nav>

            <div class="p-4 border-t border-green-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white font-semibold transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-50 p-8 overflow-y-auto">
            <header class="mb-6 flex justify-between items-center border-b border-gray-200 pb-3">
                <h1 class="text-2xl font-bold text-green-900">@yield('page_title')</h1>
                <p class="text-sm text-gray-600">Welcome, Admin</p>
            </header>

            <div>
                @yield('content')
            </div>
        </main>

    </div>

</body>
</html>
