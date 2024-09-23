@extends('layout.admin-layout')

@section('content')
<div class="container form-container">
    <h1 class="mb-4">Chỉnh sửa thông tin học sinh</h1>
    <form action="{{ url('/admin/hocsinh/update/'.$student->student_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" class="form-control" name="student_id" id="student_id" value="{{ $student->student_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $student->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $student->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $student->date_of_birth }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender" required>
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="education_level">Education Level</label>
            <input type="text" class="form-control" name="education_level" id="education_level" value="{{ $student->education_level }}" required>
        </div>
        <div class="form-group">
            <label for="training_type">Training Type</label>
            <input type="text" class="form-control" name="training_type" id="training_type" value="{{ $student->training_type }}" required>
        </div>
        <div class="form-group">
            <label for="major">Major</label>
            <input type="text" class="form-control" name="major" id="major" value="{{ $student->major }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $student->address }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $student->phone_number }}" required>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" class="form-control" name="img" id="img">
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
</div>
@endsection
