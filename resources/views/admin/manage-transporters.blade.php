@extends('layouts.admin')

@section('title')
    Manage Transporters
@endsection

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Transporters</h1>
        
        {{-- Action Buttons --}}
        <div class="mb-6 flex gap-4">
            <a href="{{ route('admin.dashboard') }}" 
               class="inline-block px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800 transition duration-200">
                Back to Dashboard
            </a>
            
            <a href="{{ route('admin.create-transporter') }}"
               class="inline-block bg-green-600 text-white py-2 px-4 rounded-md font-medium hover:bg-green-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-300">
                Add New Transporter
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Transporters Table --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Phone</th>
                        <th class="py-3 px-6 text-left">Vehicle Type</th>
                        <th class="py-3 px-6 text-left">Availability Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($transporters as $transporter)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $transporter->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $transporter->name }}</td>
                            <td class="py-3 px-6 text-left">{{ $transporter->phone }}</td>
                            <td class="py-3 px-6 text-left">{{ $transporter->vehicle_type }}</td>
                            <td class="py-3 px-6 text-left">
                                <span class="px-2 py-1 rounded-full text-xs {{ $transporter->availability_status === 'Available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $transporter->availability_status }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex justify-center items-center space-x-4">
                                    <a href="{{ route('admin.edit-transporter', ['transporter' => $transporter->id]) }}"
                                       class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                                        <span class="hidden md:inline">Edit</span>
                                        <i class="fas fa-edit md:ml-1"></i>
                                    </a>
                                    <form action="{{ route('admin.delete-transporter', ['transporter' => $transporter->id]) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this transporter?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-600 transition duration-200">
                                            <span class="hidden md:inline">Delete</span>
                                            <i class="fas fa-trash md:ml-1"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        <div class="mt-6">
            {{ $transporters->links('pagination::tailwind') }}
        </div>
    </div>
@endsection