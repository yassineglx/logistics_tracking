@extends('layouts.admin')

@section('title')
    Manage Packages
@endsection

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Packages</h1>

        {{-- Action Buttons & Notifications --}}
        <div class="mb-6 space-y-4">
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.dashboard') }}" 
                   class="inline-block px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800 transition duration-200">
                    Back to Dashboard
                </a>
                <a href="{{ route('admin.create-package') }}" 
                   class="inline-block bg-green-600 text-white py-2 px-4 rounded-md font-medium hover:bg-green-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-300">
                    Add New Package
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        {{-- Packages Table --}}
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b border-gray-300">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b border-gray-300">Sender</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b border-gray-300">Receiver</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b border-gray-300">Tracking Number</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b border-gray-300">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b border-gray-300">Delivery Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($packages as $package)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $package->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $package->sender }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $package->receiver }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $package->tracking_number }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm font-medium inline-flex items-center justify-center
                                    @switch($package->status)
                                        @case('Delivered')
                                            bg-green-100 text-green-700
                                            @break
                                        @case('In-Transit')
                                            bg-yellow-100 text-yellow-700
                                            @break
                                        @default
                                            bg-gray-100 text-gray-700
                                    @endswitch">
                                    {{ $package->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $package->delivery_date ? $package->delivery_date->format('Y-m-d') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.edit-package', $package) }}"
                                       class="px-3 py-1.5 bg-yellow-500 text-white rounded text-sm font-medium hover:bg-yellow-600 transition duration-200">
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.assign-package-form', $package) }}"
                                       class="px-3 py-1.5 bg-indigo-500 text-white rounded text-sm font-medium hover:bg-indigo-600 transition duration-200">
                                        Assign
                                    </a>
                                    <form action="{{ route('admin.delete-package', $package) }}" 
                                          method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this package?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1.5 bg-red-600 text-white rounded text-sm font-medium hover:bg-red-700 transition duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 text-sm">
                                No packages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $packages->links('pagination::tailwind') }}
        </div>
    </div>
@endsection