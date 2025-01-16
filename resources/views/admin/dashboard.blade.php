@extends('layouts.admin')

@section('title')
Welcome, Admin!
@endsection

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Welcome, Admin!</h1>
    <p class="text-gray-600 mb-8">
        This is the Admin Dashboard. Here you can manage users, transporters, and packages.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Manage Users -->
        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">
            <div class="flex items-center mb-4">
                <div class="p-3 rounded-full bg-blue-500 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2h5m6-6a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
                <h5 class="text-xl font-semibold text-gray-800 ml-4">Manage Users</h5>
            </div>
            <a href="{{ route('admin.manage-users') }}"
                class="inline-block bg-blue-600 text-white text-center px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                View Users
            </a>
        </div>

        <!-- Manage Transporters -->
        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">
            <div class="flex items-center mb-4">
                <div class="p-3 rounded-full bg-green-500 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16s-1 0-1-1 1-4 5-4h14a3 3 0 013 3v5a3 3 0 01-3 3H5a2 2 0 01-2-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 16V4H5m10 12V4h-2m4 12V4h-2" />
                    </svg>
                </div>
                <h5 class="text-xl font-semibold text-gray-800 ml-4">Manage Transporters</h5>
            </div>
            <a href="{{ route('admin.manage-transporters') }}"
                class="inline-block bg-green-600 text-white text-center px-6 py-2 rounded-lg font-medium hover:bg-green-700 transition">
                View Transporters
            </a>
        </div>

        <!-- Manage Packages -->
        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition duration-300">
            <div class="flex items-center mb-4">
                <div class="p-3 rounded-full bg-purple-500 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 12H4m16 0v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7m16 0l-8-8m-8 8l8-8" />
                    </svg>
                </div>
                <h5 class="text-xl font-semibold text-gray-800 ml-4">Manage Packages</h5>
            </div>
            <a href="{{ route('admin.manage-packages') }}"
                class="inline-block bg-purple-600 text-white text-center px-6 py-2 rounded-lg font-medium hover:bg-purple-700 transition">
                View Packages
            </a>
        </div>
    </div>
</div>
@endsection
