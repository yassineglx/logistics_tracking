<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 text-gray-800 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/5 bg-gradient-to-b from-blue-600 to-indigo-700 text-white p-6 shadow-lg">
            <h4 class="text-2xl font-extrabold mb-6 tracking-wide">Admin Panel</h4>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500">
                        <span class="material-icons-outlined mr-4 text-xl">home</span>
                        <span class="text-lg font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage-users') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500">
                        <span class="material-icons-outlined mr-4 text-xl">group</span>
                        <span class="text-lg font-medium">Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage-transporters') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500">
                        <span class="material-icons-outlined mr-4 text-xl">directions_car</span>
                        <span class="text-lg font-medium">Manage Transporters</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage-packages') }}"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:scale-105 hover:bg-blue-500">
                        <span class="material-icons-outlined mr-4 text-xl">archive</span>
                        <span class="text-lg font-medium">Manage Packages</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
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
        </div>
    </div>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</body>

</html>
