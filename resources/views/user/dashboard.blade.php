@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-8">Welcome to Your Dashboard</h1>
        <div class="shadow-lg rounded-lg mb-8">
            <div class="bg-blue-500 text-white p-4 rounded-t-lg">
                <h5 class="text-lg font-semibold mb-0">Quick Actions</h5>
            </div>
            <div class="p-6 bg-white rounded-b-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <a href="{{ route('user.profile') }}" class="btn block text-center text-lg py-3 px-6 border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white rounded-lg">
                            View Profile
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('user.packages.index') }}" class="btn block text-center text-lg py-3 px-6 border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white rounded-lg">
                            View Packages
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('user.password.edit') }}" class="btn block text-center text-lg py-3 px-6 border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white rounded-lg">
                            Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
