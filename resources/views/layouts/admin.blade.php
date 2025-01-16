<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel Dashboard">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 text-gray-800 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-blue-600 to-indigo-700 text-white p-6 shadow-lg flex flex-col">
            <div class="flex items-center justify-between mb-6">
                <h4 class="text-2xl font-extrabold tracking-wide">Admin Panel</h4>
                <!-- User Menu -->
               
            </div>
            <nav class="flex-1">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500' : '' }}">
                            <span class="material-icons-outlined mr-4 text-xl">home</span>
                            <span class="text-lg font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-users') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500 {{ request()->routeIs('admin.manage-users') ? 'bg-blue-500' : '' }}">
                            <span class="material-icons-outlined mr-4 text-xl">group</span>
                            <span class="text-lg font-medium">Manage Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-transporters') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500 {{ request()->routeIs('admin.manage-transporters') ? 'bg-blue-500' : '' }}">
                            <span class="material-icons-outlined mr-4 text-xl">directions_car</span>
                            <span class="text-lg font-medium">Manage Transporters</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-packages') }}"
                           class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500 {{ request()->routeIs('admin.manage-packages') ? 'bg-blue-500' : '' }}">
                            <span class="material-icons-outlined mr-4 text-xl">archive</span>
                            <span class="text-lg font-medium">Manage Packages</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-md p-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                    <div class="relative">
                    <button id="userMenuButton" class="text-black text-2xl hover:text-blue-200 transition-colors duration-200">
                        <span class="material-icons-outlined">account_circle</span>
                    </button>
                    <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                    
                        <hr class="my-1">
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-8">
                <!-- Alert Messages -->
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-md flex items-center">
                        <span class="material-icons-outlined mr-3">check_circle</span>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow-md flex items-center">
                        <span class="material-icons-outlined mr-3">error</span>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <!-- Dynamic Content -->
                <div class="bg-white shadow-2xl rounded-lg p-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- User Menu Toggle Script -->
    <script>
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');

        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>