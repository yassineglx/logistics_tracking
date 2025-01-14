@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Manage Users</h1>
    <a href="{{ route('admin.edit-user', ['user' => 0]) }}" class="btn btn-success mb-3">Add New User</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.edit-user', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.delete-user', ['user' => $user->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
