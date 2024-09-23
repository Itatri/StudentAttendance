@extends('layout.admin-layout')
@section('content')
<div class="container form-container">
    <h1 class="mb-4">Thêm giáo viên mới</h1>
    <form action="{{ url('/admin/giaovien/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" class="form-control" name="user_id" id="user_id" required>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="education_level">Education Level</label>
            <input type="text" class="form-control" name="education_level" id="education_level" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" required>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" class="form-control" name="img" id="img" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm giáo viên</button>
    </form>
</div>
@endsection
