@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Your Packages</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('user.packages.search') }}" class="mb-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="text" name="tracking_number"
                    class="w-full sm:w-auto px-4 py-2 border rounded-md text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-500 focus:outline-none"
                    placeholder="Search by Tracking Number" value="{{ request('tracking_number') }}">
                <select name="status"
                    class="w-full sm:w-auto px-4 py-2 border rounded-md text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-500 focus:outline-none">
                    <option value="">Filter by Status</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In-Transit" {{ request('status') == 'In-Transit' ? 'selected' : '' }}>In-Transit</option>
                    <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                </select>
                <button type="submit"
                    class="w-full sm:w-auto px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-500 focus:outline-none">
                    Search
                </button>
            </div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-2 border-b text-left text-sm font-semibold">ID</th>
                        <th class="px-4 py-2 border-b text-left text-sm font-semibold">Sender</th>
                        <th class="px-4 py-2 border-b text-left text-sm font-semibold">Receiver</th>
                        <th class="px-4 py-2 border-b text-left text-sm font-semibold">Status</th>
                        <th class="px-4 py-2 border-b text-left text-sm font-semibold">Tracking Number</th>
                        <th class="px-4 py-2 border-b text-left text-sm font-semibold">Delivery Date</th>
                        <th class="px-4 py-2 border-b text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 dark:text-gray-200">
                    @foreach ($packages as $package)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-2 border-b">{{ $package->id }}</td>
                            <td class="px-4 py-2 border-b">{{ $package->sender }}</td>
                            <td class="px-4 py-2 border-b">{{ $package->receiver }}</td>
                            <td class="px-4 py-2 border-b">
                                <span
                                    class="px-2 py-1 text-sm rounded-md 
                                    {{ $package->status == 'Delivered' ? 'bg-green-500 text-white' : ($package->status == 'In-Transit' ? 'bg-yellow-500 text-white' : 'bg-gray-500 text-white') }}">
                                    {{ $package->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2 border-b">{{ $package->tracking_number }}</td>
                            <td class="px-4 py-2 border-b">{{ $package->delivery_date->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{ route('user.packages.show', $package) }}"
                                    class="text-blue-500 hover:underline">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $packages->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
