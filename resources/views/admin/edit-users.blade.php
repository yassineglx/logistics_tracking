@extends('layouts.admin')

@section('title')
Edit User
@endsection

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit User</h1>

    <form action="{{ route('admin.update-user', ['user' => $user->id]) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
        </div>

        <!-- Email Field -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
        </div>

        <!-- Role Field -->
        <div class="mb-6">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                <option value="Transporter" {{ $user->role == 'Transporter' ? 'selected' : '' }}>Transporter</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md font-medium hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
            Update User
        </button>
    </form>
</div>
@endsection
