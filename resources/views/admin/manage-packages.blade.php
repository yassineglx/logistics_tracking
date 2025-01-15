@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Packages</h1>

    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="inline-block px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800">
            Back to Dashboard
        </a>
        <a href="{{ route('admin.create-package') }}" class="inline-block bg-green-600 text-white py-2 px-4 rounded-md font-medium hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
            Add New Package
        </a>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg mt-4">
                {{ session('success') }}
            </div>
        @endif
    </div>

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
            <tbody>
                @forelse ($packages as $package)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $package->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $package->sender }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $package->receiver }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $package->tracking_number }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 rounded-full text-sm font-medium 
                                {{ $package->status == 'Delivered' ? 'bg-green-100 text-green-700' : ($package->status == 'In-Transit' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-700') }}">
                                {{ $package->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $package->delivery_date ? $package->delivery_date->format('Y-m-d') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('admin.edit-package', $package) }}"
                                class="px-4 py-2 bg-yellow-500 text-white rounded-lg text-sm hover:bg-yellow-600">
                                Edit
                            </a>
                            <a href="{{ route('admin.assign-package-form', $package) }}"
                                class="px-4 py-2 bg-indigo-500 text-white rounded-lg text-sm hover:bg-indigo-600">
                                Assign
                            </a>
                            <form action="{{ route('admin.delete-package', $package) }}" method="POST"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No packages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $packages->links('pagination::tailwind') }}
    </div>
</div>
@endsection
