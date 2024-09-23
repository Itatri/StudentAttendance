@extends('layout.user-layout')

@section('title', 'Trang Chủ')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thông Tin Sinh Viên</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url('assets/book') }}/{{ $profile->img }}" alt="Ảnh Sinh Viên" class="img-fluid rounded-circle shadow">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>MSHV:</strong> {{ $profile->student_id }} </p>
                            <p class="card-text"><strong>Lớp học:</strong> {{ $profile->major }} </p>
                            <p class="card-text"><strong>Họ tên:</strong> {{ $profile->firt_name }} {{ $profile->last_name }} </p>
                            <p class="card-text"><strong>Khóa học:</strong> 2021</p>
                            <p class="card-text"><strong>Giới tính:</strong> {{ $profile->gender }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Bậc đào tạo:</strong> {{ $profile->education_level }}</p>
                            <p class="card-text"><strong>Ngày sinh:</strong> {{ $profile->date_of_birth }} </p>
                            <p class="card-text"><strong>Loại hình đào tạo:</strong> {{ $profile->training_type }}</p>
                            <p class="card-text"><strong>Nơi sinh:</strong> {{ $profile->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
