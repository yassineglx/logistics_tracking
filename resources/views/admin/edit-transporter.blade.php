@extends('layouts.admin')

@section('title')
Edit Transporter
@endsection

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Edit Transporter</h1>

    <form action="{{ route('admin.update-transporter', ['transporter' => $transporter->id]) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $transporter->name) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
        </div>

        <!-- Phone Field -->
        <div class="mb-6">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $transporter->phone) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
        </div>

        <!-- Vehicle Type Field -->
        <div class="mb-6">
            <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
            <input type="text" id="vehicle_type" name="vehicle_type" value="{{ old('vehicle_type', $transporter->vehicle_type) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
        </div>

        <!-- Availability Status Field -->
        <div class="mb-6">
            <label for="availability_status" class="block text-sm font-medium text-gray-700">Availability Status</label>
            <select id="availability_status" name="availability_status" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                <option value="Available" {{ $transporter->availability_status == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Busy" {{ $transporter->availability_status == 'Busy' ? 'selected' : '' }}>Busy</option>
            </select>
        </div>

        <div class="mb-4">
    <label for="user_id" class="block text-gray-700 font-medium">Select User</label>
    <select id="user_id" name="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300">
        <option value="">Select a user</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', $transporter->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->email }})
            </option>
        @endforeach
    </select>
    @error('user_id')
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
    @enderror
</div>
        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md font-medium hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
            Update Transporter
        </button>
    </form>
</div>
@endsection
