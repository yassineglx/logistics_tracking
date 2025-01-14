@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Transporter</h1>

    <form action="{{ route('admin.update-transporter', ['transporter' => $transporter->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $transporter->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $transporter->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="vehicle_type" class="form-label">Vehicle Type</label>
            <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" value="{{ old('vehicle_type', $transporter->vehicle_type) }}" required>
        </div>

        <div class="mb-3">
            <label for="availability_status" class="form-label">Availability Status</label>
            <select class="form-control" id="availability_status" name="availability_status" required>
                <option value="Available" {{ $transporter->availability_status == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Unavailable" {{ $transporter->availability_status == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Transporter</button>
    </form>
</div>
@endsection
