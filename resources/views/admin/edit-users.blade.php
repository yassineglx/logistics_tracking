@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit User</h1>

    <form action="{{ route('admin.update-user', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                <option value="Transporter" {{ $user->role == 'Transporter' ? 'selected' : '' }}>Transporter</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
