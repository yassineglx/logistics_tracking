@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Create Package</h2>
    <form method="POST" action="{{ route('admin.store-package') }}" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="sender" class="block text-sm font-medium text-gray-700">Sender</label>
            <input type="text" name="sender" id="sender" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter sender name" required>
        </div>

        <div class="mb-4">
            <label for="receiver" class="block text-sm font-medium text-gray-700">Receiver</label>
            <input type="text" name="receiver" id="receiver" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter receiver name" required>
        </div>

        <div class="mb-4">
            <label for="tracking_number" class="block text-sm font-medium text-gray-700">Tracking Number</label>
            <input type="text" name="tracking_number" id="tracking_number" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" placeholder="Enter tracking number" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300">
                <option value="Pending">Pending</option>
                <option value="In-Transit">In-Transit</option>
                <option value="Delivered">Delivered</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="delivery_date" class="block text-sm font-medium text-gray-700">Delivery Date</label>
            <input type="date" name="delivery_date" id="delivery_date" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300">
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Package</button>
        </div>
    </form>
</div>
@endsection
