@extends('layouts.admin_layouts.admin_ContainPage')

@section('content')
<div class="container mt-4">
    <h2>Admin Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>New Password (optional):</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
