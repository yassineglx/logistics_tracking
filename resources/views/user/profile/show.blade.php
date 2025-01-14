@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 mt-8">
        <h1 class="text-2xl font-bold mb-6">Your Profile</h1>
        <div class="bg-white rounded-lg shadow">
            <div class="bg-blue-600 px-6 py-4 rounded-t-lg">
                <h5 class="text-white font-medium">Profile Details</h5>
            </div>
            <div class="p-6">
                <div class="space-y-3 mb-6">
                    <p class="text-gray-700">
                        <span class="font-semibold">Name:</span> 
                        <span>{{ $user->name }}</span>
                    </p>
                    <p class="text-gray-700">
                        <span class="font-semibold">Email:</span> 
                        <span>{{ $user->email }}</span>
                    </p>
                </div>
                <div class="flex gap-3">
                    <a 
                        href="{{ route('user.profile.edit') }}" 
                        class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors text-sm"
                    >
                        Edit Profile
                    </a>
                    <a 
                        href="{{ route('user.password.edit') }}" 
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors text-sm"
                    >
                        Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection