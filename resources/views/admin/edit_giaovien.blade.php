@extends('layout.admin-layout')

@section('content')
<div class="container form-container">
    <h1 class="mb-4">Chỉnh sửa thông tin giáo viên</h1>
    <form action="{{ url('/admin/teachers/update/'.$teacher->teacher_id) }}" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="teacher_id">Teacher ID</label>
            <input type="text" class="form-control" name="teacher_id" id="teacher_id" value="{{ $teacher->teacher_id }}" readonly>
        </div>
        {{-- <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $teacher->user_id }}" required>
        </div> --}}
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $teacher->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $teacher->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $teacher->date_of_birth }}" required>
        </div>

      
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender" required>
                <option value="male" {{ $teacher->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $teacher->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $teacher->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="education_level">Education Level</label>
            <input type="text" class="form-control" name="education_level" id="education_level" value="{{ $teacher->education_level }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $teacher->address }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $teacher->phone_number }}" required>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" class="form-control" name="img" id="img">
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
</div>
@endsection
