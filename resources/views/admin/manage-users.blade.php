@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Users</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.manage-users') }}" class="grid grid-cols-12 gap-4 mb-6">
        <div class="col-span-8 sm:col-span-6">
            <input type="text" name="search" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Search users..." value="{{ request('search') }}">
        </div>
        <div class="col-span-4 sm:col-span-2">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md font-medium hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Search
            </button>
        </div>
    </form>

    <!-- Add New User Button -->
    <a href="{{ route('admin.create-user') }}" class="inline-block bg-green-600 text-white py-2 px-4 rounded-md font-medium mb-6 hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
        Add New User
    </a>

    <!-- Users Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Role</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $user->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $user->name }}</td>
                    <td class="py-3 px-6 text-left">{{ $user->email }}</td>
                    <td class="py-3 px-6 text-left">{{ $user->role }}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex justify-center items-center space-x-4">
                            <a href="{{ route('admin.edit-user', ['user' => $user->id]) }}" class="text-yellow-500 hover:text-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('admin.delete-user', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 ">
        {{ $users->links('') }}
    </div>
</div>
@endsection
