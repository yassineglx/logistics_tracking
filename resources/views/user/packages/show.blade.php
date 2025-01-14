@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Package Details</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-500 text-white px-6 py-4">
                <h5 class="text-lg font-medium">Tracking Information</h5>
            </div>
            <div class="p-6 text-gray-800 dark:text-gray-200">
                <p class="mb-4"><strong>Sender:</strong> {{ $package->sender }}</p>
                <p class="mb-4"><strong>Receiver:</strong> {{ $package->receiver }}</p>
                <p class="mb-4">
                    <strong>Status:</strong> 
                    <span class="px-2 py-1 text-sm rounded-md 
                        {{ $package->status == 'Delivered' ? 'bg-green-500 text-white' : ($package->status == 'In-Transit' ? 'bg-yellow-500 text-white' : 'bg-gray-500 text-white') }}">
                        {{ $package->status }}
                    </span>
                </p>
                <p class="mb-4"><strong>Tracking Number:</strong> {{ $package->tracking_number }}</p>
                <p class="mb-4"><strong>Description:</strong> {{ $package->description }}</p>
                <p class="mb-4"><strong>Delivery Date:</strong> {{ $package->delivery_date->format('Y-m-d') }}</p>
                <a href="{{ route('user.packages.index') }}" 
                   class="inline-block px-6 py-2 mt-4 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                    Back to Packages
                </a>
            </div>
        </div>
    </div>
@endsection
