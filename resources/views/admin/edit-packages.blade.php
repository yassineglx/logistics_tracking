@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2>Edit Package</h2>

        <form method="POST" action="{{ route('admin.update-package', $package->id) }}">
            @csrf
            @method('PUT')

            <!-- Sender -->
            <div class="mb-3">
                <label for="sender" class="form-label">Sender</label>
                <input type="text" name="sender" id="sender" class="form-control" value="{{ old('sender', $package->sender) }}" required>
                @error('sender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Receiver -->
            <div class="mb-3">
                <label for="receiver" class="form-label">Receiver</label>
                <input type="text" name="receiver" id="receiver" class="form-control" value="{{ old('receiver', $package->receiver) }}" required>
                @error('receiver')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tracking Number -->
            <div class="mb-3">
                <label for="tracking_number" class="form-label">Tracking Number</label>
                <input type="text" name="tracking_number" id="tracking_number" class="form-control" value="{{ old('tracking_number', $package->tracking_number) }}" required>
                @error('tracking_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="Pending" {{ old('status', $package->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In-Transit" {{ old('status', $package->status) == 'In-Transit' ? 'selected' : '' }}>In-Transit</option>
                    <option value="Delivered" {{ old('status', $package->status) == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Assigned User -->
            <div class="mb-3">
                <label for="user_id" class="form-label">Assign to User</label>
                <select name="user_id" id="user_id" class="form-select">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $package->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $package->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Delivery Date -->
            <div class="mb-3">
                <label for="delivery_date" class="form-label">Delivery Date</label>
                <input type="date" name="delivery_date" id="delivery_date" class="form-control" value="{{ old('delivery_date', $package->delivery_date ? $package->delivery_date->format('Y-m-d') : '') }}">
                @error('delivery_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Package</button>
        </form>
    </div>
@endsection
