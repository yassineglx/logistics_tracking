@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Assign Package to User</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.assign-package', $package) }}" method="POST">
                @csrf

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
                    @error('user_id')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Assign Package
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
