@extends('layout.user-layout')

@section('title', 'Trang Chủ')

@section('content')
<style>
    .student-card {
        background: linear-gradient(135deg, #e3f0ff 0%, #f9f9f9 100%);
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(0,123,255,0.08);
        transition: box-shadow 0.2s;
        border: none;
    }
    .student-card:hover {
        box-shadow: 0 8px 32px rgba(0,123,255,0.18);
    }
    .student-profile-img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid #fff;
        box-shadow: 0 0 0 6px #007bff, 0 4px 16px rgba(0,0,0,0.08);
        margin-bottom: 18px;
        background: #f1f1f1;
    }
    .student-info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .student-info-list li {
        margin-bottom: 12px;
        font-size: 1.08rem;
        display: flex;
        align-items: center;
    }
    .student-info-list i {
        color: #007bff;
        margin-right: 10px;
        min-width: 22px;
        text-align: center;
    }
    .student-name {
        font-size: 1.35rem;
        font-weight: 700;
        color: #2c387e;
        margin-bottom: 6px;
    }
    @media (max-width: 768px) {
        .student-profile-img { width: 110px; height: 110px; }
        .student-card { padding: 1rem !important; }
    }
</style>
<div class="container mt-5">
    <div class="card student-card p-4">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <img src="{{ url('assets/book') }}/{{ $profile->img }}" alt="Ảnh Sinh Viên" class="student-profile-img">
                <div class="student-name">{{ $profile->firt_name }} {{ $profile->last_name }}</div>
                <div class="text-muted">Mã SV: <b>{{ $profile->student_id }}</b></div>
                </div>
                <div class="col-md-8">
                <ul class="student-info-list">
                    <li><i class="fas fa-user-graduate"></i> <b>Lớp học:</b> {{ $profile->major }}</li>
                    <li><i class="fas fa-layer-group"></i> <b>Bậc đào tạo:</b> {{ $profile->education_level }}</li>
                    <li><i class="fas fa-calendar-alt"></i> <b>Khóa học:</b> 2021</li>
                    <li><i class="fas fa-venus-mars"></i> <b>Giới tính:</b> {{ $profile->gender }}</li>
                    <li><i class="fas fa-birthday-cake"></i> <b>Ngày sinh:</b> {{ $profile->date_of_birth }}</li>
                    <li><i class="fas fa-graduation-cap"></i> <b>Loại hình đào tạo:</b> {{ $profile->training_type }}</li>
                    <li><i class="fas fa-map-marker-alt"></i> <b>Nơi sinh:</b> {{ $profile->address }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
