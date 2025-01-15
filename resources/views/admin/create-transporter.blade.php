@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Create Transporter</h2>
    <form method="POST" action="{{ route('admin.store-transporter') }}" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter name" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter phone number" required>
        </div>

        <div class="mb-4">
            <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
            <input type="text" name="vehicle_type" id="vehicle_type" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter vehicle type" required>
        </div>

        <div class="mb-4">
            <label for="license_plate" class="block text-sm font-medium text-gray-700">License Plate</label>
            <input type="text" name="license_plate" id="license_plate" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter license plate" required>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Transporter</button>
        </div>
    </form>
</div>
@endsection
