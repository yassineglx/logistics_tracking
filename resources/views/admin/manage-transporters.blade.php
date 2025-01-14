@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Manage Transporters</h1>
    <a href="{{ route('admin.edit-transporter', ['transporter' => 0]) }}" class="btn btn-success mb-3">Add New Transporter</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Vehicle Type</th>
                <th>Availability Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transporters as $transporter)
            <tr>
                <td>{{ $transporter->id }}</td>
                <td>{{ $transporter->name }}</td>
                <td>{{ $transporter->phone }}</td>
                <td>{{ $transporter->vehicle_type }}</td>
                <td>{{ $transporter->availability_status }}</td>
                <td>
                    <a href="{{ route('admin.edit-transporter', ['transporter' => $transporter->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.delete-transporter', ['transporter' => $transporter->id]) }}" method="POST" style="display:inline;">
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
