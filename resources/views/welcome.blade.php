<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Track your shipments in real-time with our advanced logistics and transport tracking app.">
    <meta name="keywords" content="logistics, tracking app, transport tracking, shipment tracking">
    <title>{{ config('app.name') }} - Logistics & Transport Tracking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-gray-800">{{ config('app.name') }}</h1>
                </div>
                <div class="flex items-center">
                    @auth
                    {{-- <div>
                        <p>Role: {{ Auth::user()->role }}</p>
                    </div> --}}
                    @if(Auth::user()->hasRole('Admin'))
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 px-4">Admin Dashboard</a>
                    @elseif(Auth::user()->hasRole('User'))
                        <a href="{{ route('user.dashboard') }}" class="text-gray-700 hover:text-blue-600 px-4">User Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-md">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-4">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Register</a>
                @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                        Track Your Shipments
                        <span class="block text-blue-600">In Real Time</span>
                    </h1>
                    <p class="mt-4 text-gray-500 text-lg leading-relaxed">
                        Get real-time updates on your shipments, manage your logistics, and optimize your supply chain with our advanced tracking system.
                    </p>
                    <div class="mt-6 flex justify-center lg:justify-start">
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-blue-600 text-white text-lg rounded-md hover:bg-blue-700 transition">
                            Get Started
                        </a>
                        <a href="#features" class="ml-4 px-8 py-3 border border-blue-600 text-blue-600 text-lg rounded-md hover:bg-blue-100 transition">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="mt-10 lg:mt-0 lg:ml-10">
                    <img src="https://media.istockphoto.com/id/1307002913/photo/airplane-flying-above-container-port.jpg?s=612x612&w=0&k=20&c=R0qVwkhcgTiuWw0wt0llFAlCwsQpJ7Iv8SNlu_rItbc=" alt="Logistics tracking" class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Features</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Everything you need to manage your shipments
                </p>
            </div>
            <div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Feature Cards -->
                <div class="bg-gray-50 shadow-md rounded-lg p-6 text-center">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-full mx-auto flex items-center justify-center">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-gray-900">Real-time Tracking</h3>
                    <p class="mt-2 text-gray-500">Track your shipments in real-time with precise GPS updates.</p>
                </div>



                <div class="bg-gray-50 shadow-md rounded-lg p-6 text-center">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-full mx-auto flex items-center justify-center">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-gray-900">Real-time Tracking</h3>
                    <p class="mt-2 text-gray-500">Track your shipments in real-time with precise GPS updates.</p>
                </div>


                
                <div class="bg-gray-50 shadow-md rounded-lg p-6 text-center">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-full mx-auto flex items-center justify-center">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-gray-900">Real-time Tracking</h3>
                    <p class="mt-2 text-gray-500">Track your shipments in real-time with precise GPS updates.</p>
                </div>
                <!-- Add more feature cards as needed -->
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <div class="bg-blue-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">What Our Users Say</h2>
            <p class="mt-4 text-lg text-gray-600">Trusted by thousands of customers worldwide.</p>
            <div class="mt-10 flex justify-center">
                <blockquote class="max-w-lg bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-600 italic">"This app has revolutionized how we manage our logistics. Highly recommend it!"</p>
                    <cite class="mt-4 text-gray-900 font-bold">— John Doe</cite>
                </blockquote>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="py-16 bg-gray-800 text-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold sm:text-4xl">Stay Updated</h2>
            <p class="mt-4 text-lg">Subscribe to our newsletter for the latest updates.</p>
            <form class="mt-6 flex justify-center">
                <input type="email" placeholder="Enter your email" class="px-4 py-3 w-64 rounded-l-md">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 transition">
                    Subscribe
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>
</body>
</html>
