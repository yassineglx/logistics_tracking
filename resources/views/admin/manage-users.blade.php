@extends('layouts.admin')

@section('title')
Manage Users
@endsection

@section('content')
<div class="container mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Manage Users</h1>
            <p class="text-gray-600 mt-1">View and manage system users</p>
        </div>
        <a href="{{ route('admin.create-user') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <span class="material-icons-outlined text-xl mr-2">person_add</span>
            Add New User
        </a>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('admin.manage-users') }}" class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-5">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Users</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-icons-outlined text-gray-400">search</span>
                    </span>
                    <input type="text" 
                           id="search"
                           name="search" 
                           class="pl-10 w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="Search by name or email..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Filter by Role</label>
                <select name="role" 
                        id="role"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Roles</option>
                    <option value="Admin" {{ request('role') === 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ request('role') === 'User' ? 'selected' : '' }}>User</option>
                    <option value="Transporter" {{ request('role') === 'Transporter' ? 'selected' : '' }}>Transporter</option>
                </select>
            </div>
            <div class="col-span-12 md:col-span-2 flex items-end">
                <button type="submit" 
                        class="w-full bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Details</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-gray-100">
                                        <span class="text-sm font-medium text-gray-600">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </span>
                                    </span>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('admin.edit-user', ['user' => $user->id]) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                    <span class="material-icons-outlined text-sm mr-1">edit</span>
                                    Edit
                                </a>
                                <form action="{{ route('admin.delete-user', ['user' => $user->id]) }}" 
                                      method="POST" 
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 flex items-center">
                                        <span class="material-icons-outlined text-sm mr-1">delete</span>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection