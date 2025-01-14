@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Welcome, Admin!</h1>
    <p>This is the Admin Dashboard. Here you can manage users, transporters, and packages.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Manage Users</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.manage-users') }}" class="btn btn-primary btn-block">View Users</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Manage Transporters</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.manage-transporters') }}" class="btn btn-primary btn-block">View Transporters</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Manage Packages</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.manage-packages') }}" class="btn btn-primary btn-block">View Packages</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
