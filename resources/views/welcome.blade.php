<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Advanced logistics and transport tracking platform for real-time shipment monitoring, fleet management, and supply chain optimization">
    <meta name="keywords" content="logistics, tracking app, transport tracking, shipment tracking, fleet management, supply chain, warehousing">
    <title>{{ config('app.name') }} - Smart Logistics & Transport Tracking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200 fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left side - Logo/Brand -->
            <div class="flex items-center flex-shrink-0">
                <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">
                    {{ config('app.name') }}
                </h1>
            </div>

          <!-- Right side - Navigation Items -->
<div x-data="{ profileOpen: false, menuOpen: false }" class="flex items-center space-x-4">
    @auth
        <!-- User Name and Role Display -->
        <!-- <div class="hidden md:flex items-center mr-4">
            <div class="flex flex-col">
                <span class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                <span class="text-xs text-gray-600">
                    @if(Auth::user()->hasRole('Admin'))
                        Administrator
                    @else
                        User
                    @endif
                </span>
            </div>
        </div> -->

        <!-- Admin/User Dashboard Links -->
        <!-- <div class="hidden md:flex items-center space-x-4">
            @if(Auth::user()->hasRole('Admin'))
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false"
                            class="flex items-center text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                            </svg>
                            Admin Dashboard
                        </span>
                        <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                         
                        </div>
                    </div>
                </div>
            @elseif(Auth::user()->hasRole('User'))
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false"
                            class="flex items-center text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            User Dashboard
                        </span>
                        <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                            
                        </div>
                    </div>
                </div>
            @endif
        </div> -->

        <!-- User Actions -->
        <div class="flex items-center space-x-4">
            <!-- User Profile/Settings Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" @click.away="open = false"
                        class="flex items-center p-2 text-gray-600 hover:text-gray-900 rounded-full hover:bg-gray-100 transition-colors duration-200">
                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 uppercase font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                    <div class="py-1">
                        <div class="px-4 py-2 text-sm border-b">
                            <p class="font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-gray-500 text-xs">{{ Auth::user()->email }}</p>
                            <p class="text-gray-500 text-xs mt-1">
                                @if(Auth::user()->hasRole('Admin'))
                                    Administrator
                                @else
                                    User
                                @endif
                            </p>
                        </div>
                         
                 @if(Auth::user()->hasRole('Admin'))
                       
                        <div class="py-1">
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                         
                        </div>
               

                @elseif(Auth::user()->hasRole('User'))
                    
                        <div class="py-1">
                            <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                            
                        </div>
                    
                        
                       
                    @endif
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
    @else
        <!-- Authentication Links -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" 
               class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                Login
            </a>
            <a href="{{ route('register') }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Register
            </a>
        </div>
    @endauth
</div>
    </div>
</nav>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="text-center lg:text-left text-white lg:w-1/2">
                    <h1 class="text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl">
                        Smart Logistics Solutions
                        <span class="block text-blue-300">Powered by AI</span>
                    </h1>
                    <p class="mt-6 text-xl text-blue-100 leading-relaxed">
                        Transform your supply chain with our advanced tracking system. Get real-time visibility, predictive analytics, and automated notifications for your entire logistics operation.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-blue-900 text-lg font-semibold rounded-lg hover:bg-blue-50 transition-all transform hover:scale-105">
                            Start Free Trial
                        </a>
                        <a href="#demo" class="px-8 py-4 border-2 border-white text-white text-lg font-semibold rounded-lg hover:bg-white/10 transition-all">
                            Watch Demo
                        </a>
                    </div>
                    <div class="mt-8 flex items-center justify-center lg:justify-start space-x-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-2 text-blue-100">99.9% Uptime</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-2 text-blue-100">ISO Certified</span>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/2">
                    <img src="https://media.istockphoto.com/id/1307002913/photo/airplane-flying-above-container-port.jpg?s=612x612&w=0&k=20&c=R0qVwkhcgTiuWw0wt0llFAlCwsQpJ7Iv8SNlu_rItbc=" alt="Logistics Dashboard" class="rounded-lg shadow-xl transform -rotate-6 hover:rotate-0 transition-transform duration-300">
                </div>
            </div>
        </div>
    </div>

    <!-- Features Grid -->
    <div id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Capabilities</h2>
                <p class="mt-2 text-4xl font-bold text-gray-900">Complete Logistics Control</p>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">Manage your entire supply chain with our comprehensive suite of tools.</p>
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Real-time Tracking -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                    <div class="relative bg-white px-7 py-6 rounded-lg leading-none flex items-center space-x-6">
                        <div class="flex-shrink-0">
                            <div class="p-4 bg-blue-50 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Real-time GPS Tracking</h3>
                            <p class="text-gray-500">Monitor your fleet and shipments in real-time with precision GPS technology and automated alerts.</p>
                        </div>
                    </div>
                </div>

                <!-- Warehouse Management -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                    <div class="relative bg-white px-7 py-6 rounded-lg leading-none flex items-center space-x-6">
                        <div class="flex-shrink-0">
                            <div class="p-4 bg-blue-50 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Warehouse Management</h3>
                            <p class="text-gray-500">Optimize inventory management with smart warehousing solutions and automated stock control.</p>
                        </div>
                    </div>
                </div>

                <!-- Analytics Dashboard -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                    <div class="relative bg-white px-7 py-6 rounded-lg leading-none flex items-center space-x-6">
                        <div class="flex-shrink-0">
                            <div class="p-4 bg-blue-50 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Analytics Dashboard</h3>
                            <p class="text-gray-500">Make data-driven decisions with comprehensive analytics and performance insights.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="bg-blue-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4 text-center">
                <div class="bg-blue-800/50 p-6 rounded-lg">
                    <div class="text-4xl font-bold text-white">99.9%</div>
                    <div class="text-blue-200 mt-2">Delivery Accuracy</div>
                </div>
                <div class="bg-blue-800/50 p-6 rounded-lg">
                    <div class="text-4xl font-bold text-white">15k+</div>
                    <div class="text-blue-200 mt-2">Active Users</div>
                </div>
                <div class="bg-blue-800/50 p-6 rounded-lg">
                    <div class="text-4xl font-bold text-white">24/7</div>
                    <div class="text-blue-200 mt-2">Support Available</div>
                </div>
                <div class="bg-blue-800/50 p-6 rounded-lg">
                    <div class="text-4xl font-bold text-white">50+</div>
                    <div class="text-blue-200 mt-2">Countries Served</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Integration Partners -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Integrations</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900">Works With Your Tools</p>
                <div class="mt-12 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-6">
                    <!-- Integration Partner Logos -->
                    <div class="col-span-1 flex justify-center items-center">
                        <div class="h-12 w-full bg-gray-200 rounded-lg"></div>
                    </div>
                    <div class="col-span-1 flex justify-center items-center">
                        <div class="h-12 w-full bg-gray-200 rounded-lg"></div>
                    </div>
                    <div class="col-span-1 flex justify-center items-center">
                        <div class="h-12 w-full bg-gray-200 rounded-lg"></div>
                    </div>
                    <div class="col-span-1 flex justify-center items-center">
                        <div class="h-12 w-full bg-gray-200 rounded-lg"></div>
                    </div>
                    <div class="col-span-1 flex justify-center items-center">
                        <div class="h-12 w-full bg-gray-200 rounded-lg"></div>
                    </div>
                    <div class="col-span-1 flex justify-center items-center">
                    <div class="h-12 w-full bg-gray-200 rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Pricing</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900">Plans for Every Business Size</p>
            </div>
            <div class="mt-12 grid gap-8 lg:grid-cols-3">
                <!-- Starter Plan -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-8">
                        <h3 class="text-2xl font-bold text-gray-900">Starter</h3>
                        <div class="mt-4">
                            <span class="text-4xl font-bold">$49</span>
                            <span class="text-gray-500">/month</span>
                        </div>
                        <ul class="mt-6 space-y-4">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Up to 100 shipments/month</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Basic analytics</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Email support</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 py-4 bg-gray-50">
                        <a href="#" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Get Started</a>
                    </div>
                </div>

                <!-- Professional Plan -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden border-2 border-blue-600 transform scale-105">
                    <div class="px-6 py-8">
                        <h3 class="text-2xl font-bold text-gray-900">Professional</h3>
                        <div class="mt-4">
                            <span class="text-4xl font-bold">$149</span>
                            <span class="text-gray-500">/month</span>
                        </div>
                        <ul class="mt-6 space-y-4">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Unlimited shipments</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Advanced analytics</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">24/7 phone support</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">API access</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 py-4 bg-gray-50">
                        <a href="#" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Get Started</a>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-8">
                        <h3 class="text-2xl font-bold text-gray-900">Enterprise</h3>
                        <div class="mt-4">
                            <span class="text-4xl font-bold">Custom</span>
                        </div>
                        <ul class="mt-6 space-y-4">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Custom integration</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Dedicated account manager</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">Custom reporting</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 py-4 bg-gray-50">
                        <a href="#" class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Contact Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to get started?</span>
                <span class="block text-blue-300">Start your free trial today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-900 bg-white hover:bg-blue-50">
                        Get started
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Learn more
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                <div>
                    <h3 class="text-white text-sm font-semibold">Product</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Features</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">API</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Documentation</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-sm font-semibold">Company</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-sm font-semibold">Resources</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Support Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Partners</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Community</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Status</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-sm font-semibold">Legal</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Privacy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Terms</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Security</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Licenses</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-8">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </div>
                    <div class="flex space-x-6">
                        <!-- Social Media Links -->
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Download App Section -->
                <div class="mt-8 flex items-center justify-center space-x-6">
                    <a href="#" class="flex items-center border border-gray-700 rounded-lg px-4 py-2 hover:border-gray-500 transition-colors">
                        <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.001 19.9997C16.5 20.9997 15.901 21.9997 15.201 22.9997C14.301 23.9997 13.5 24.1997 12.5 24.1997C11.5 24.1997 10.801 23.9997 10.201 22.9997C9.50104 21.9997 8.80104 20.9997 8.20104 19.9997C7.30104 18.9997 6.60104 17.7997 6.00104 16.3997C5.40104 14.9997 5.00104 13.4997 5.00104 11.9997C5.00104 10.3997 5.40104 8.99969 6.20104 7.79969C6.80104 6.89969 7.60104 6.19969 8.60104 5.69969C9.60104 5.19969 10.701 4.89969 11.901 4.89969C12.901 4.89969 13.901 5.09969 14.701 5.39969C15.501 5.69969 16.301 5.89969 17.001 5.89969C17.901 5.89969 18.701 5.69969 19.401 5.39969C20.101 5.09969 20.801 4.89969 21.501 4.89969C22.801 4.89969 24.001 5.29969 25.001 6.09969L20.001 13.9997C19.501 14.6997 19.001 15.2997 18.501 15.7997C18.001 16.2997 17.501 16.6997 17.001 16.9997V19.9997ZM15.901 0.199695C15.901 1.39969 15.401 2.49969 14.501 3.39969C13.601 4.29969 12.401 4.79969 11.101 4.69969C11.101 3.39969 11.601 2.19969 12.601 1.29969C13.101 0.799695 13.701 0.399695 14.501 0.199695C15.301 -0.000305176 16.001 -0.000305176 16.601 0.199695C16.601 0.199695 15.901 0.199695 15.901 0.199695Z"/>
                        </svg>
                        <div class="ml-3">
                            <p class="text-xs text-gray-400">Download on the</p>
                            <p class="text-sm font-semibold text-white">App Store</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center border border-gray-700 rounded-lg px-4 py-2 hover:border-gray-500 transition-colors">
                        <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.018 13.298l-3.919 2.218-3.515-3.493 3.543-3.521 3.891 2.202a1.49 1.49 0 0 1 0 2.594zM1.337.924a1.486 1.486 0 0 0-.112.568v21.017c0 .217.045.419.124.6l11.155-11.087L1.337.924zm12.207 10.065l3.258-3.238L3.45.195a1.466 1.466 0 0 0-.946-.179l11.04 10.973zm0 2.067l-11 10.933c.298.036.612-.016.906-.183l13.324-7.54-3.23-3.21z"/>
                        </svg>
                        <div class="ml-3">
                            <p class="text-xs text-gray-400">Get it on</p>
                            <p class="text-sm font-semibold text-white">Google Play</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cookie Consent Banner -->
    <div class="fixed bottom-0 inset-x-0 pb-2 sm:pb-5 z-50">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="p-2 rounded-lg bg-blue-600 shadow-lg sm:p-3">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden">We use cookies</span>
                            <span class="hidden md:inline">We use cookies to enhance your experience.</span>
                        </p>
                    </div>
                    <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                        <button class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-blue-600 bg-white hover:bg-blue-50">
                            Accept
                        </button>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                        <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-white">
                            <span class="sr-only">Dismiss</span>
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>