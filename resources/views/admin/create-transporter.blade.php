@extends('layouts.admin')
@section('title')
Create Transporter
@endsection
@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Create Transporter</h2>
    <form method="POST" action="{{ route('admin.store-transporter') }}" class="bg-white shadow-lg rounded-lg p-6">
        @csrf

        @if ($errors->any())
    <div class="space-y-2">
        @foreach ($errors->all() as $error)
            <div class="bg-red-50 border border-red-500 text-red-600 px-4 py-2 rounded">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
        <div class="mb-4">
        @error('name')
    <div class="bg-red-50 border border-red-500 text-red-600 px-4 py-2 rounded mt-1">
        {{ $message }}
    </div>
@enderror
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter name" required>
        </div>

        <div class="mb-4">
        @error('phone')
    <div class="bg-red-50 border border-red-500 text-red-600 px-4 py-2 rounded mt-1">
        {{ $message }}
    </div>
@enderror
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter phone number" required>
        </div>

        <div class="mb-4">
        @error('vehicle_type')
    <div class="bg-red-50 border border-red-500 text-red-600 px-4 py-2 rounded mt-1">
        {{ $message }}
    </div>
@enderror
            <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
            <input type="text" name="vehicle_type" id="vehicle_type" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter vehicle type" required>
        </div>

        <div class="mb-4">
        @error('license_plate')
    <div class="bg-red-50 border border-red-500 text-red-600 px-4 py-2 rounded mt-1">
        {{ $message }}
    </div>
@enderror
            <label for="license_plate" class="block text-sm font-medium text-gray-700">License Plate</label>
            <input type="text" name="license_plate" id="license_plate" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter license plate" required>
        </div>

        <div class="mb-6">
        @error('availability_status')
    <div class="bg-red-50 border border-red-500 text-red-600 px-4 py-2 rounded mt-1">
        {{ $message }}
    </div>
    @enderror
            <label for="availability_status" class="block text-sm font-medium text-gray-700">Availability Status</label>
            <select id="availability_status" name="availability_status" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                <option value="Available" >Available</option>
                <option value="Busy" >Busy</option>
            </select>
        </div>

        <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-medium">Select User</label>
                    <select id="user_id" name="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300">
                        <option value="" disabled selected>Select a user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
</div>
        <div class="mt-6">
            <button type="submit" class="w-full px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Transporter</button>
        </div>
    </form>
</div>
@endsection
