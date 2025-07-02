@extends('layout.user-layout')
@section('title', 'Giới thiệu')
@section('content')
<div class="container py-4">
    <div class="text-center mb-5">
        <img src="/assets/Logo.png" alt="Logo" style="width:90px;">
        <h1 class="main-title mt-3">Hệ thống điểm danh sinh viên</h1>
        <p class="lead">Nền tảng quản lý điểm danh hiện đại, tiện lợi cho sinh viên, giáo viên và quản trị viên.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="feature-box text-center">
                <div class="feature-icon mb-3"><i class="fas fa-user-graduate"></i></div>
                <h4>Sinh viên</h4>
                <ul class="text-start mt-3">
                    <li>Xem thông tin cá nhân, lịch học, lịch sử điểm danh.</li>
                    <li>Tra cứu trạng thái điểm danh từng buổi học.</li>
                    <li>Nhận thông báo từ giáo viên/quản trị viên.</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box text-center">
                <div class="feature-icon mb-3"><i class="fas fa-chalkboard-teacher"></i></div>
                <h4>Giáo viên</h4>
                <ul class="text-start mt-3">
                    <li>Quản lý lớp học, điểm danh sinh viên từng buổi.</li>
                    <li>Xem lịch dạy, thống kê điểm danh.</li>
                    <li>Gửi thông báo cho sinh viên.</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box text-center">
                <div class="feature-icon mb-3"><i class="fas fa-user-cog"></i></div>
                <h4>Quản trị viên</h4>
                <ul class="text-start mt-3">
                    <li>Quản lý tài khoản sinh viên, giáo viên.</li>
                    <li>Phân quyền, tạo lớp học, quản lý dữ liệu điểm danh.</li>
                    <li>Xem báo cáo tổng hợp toàn hệ thống.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <p class="text-muted">&copy; {{ date('Y') }} Student Attendance. All rights reserved.</p>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/4e7b8e7e2a.js" crossorigin="anonymous"></script>
<style>
    .feature-icon { font-size: 2.5rem; color: #007bff; }
    .feature-box { background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 32px 24px; margin-bottom: 24px; }
    .main-title { font-weight: 700; color: #2d3748; }
    .lead { color: #4a5568; }
</style>
@endsection 