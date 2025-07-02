@extends('layout.user-layout')

@section('title', 'Chi tiết buổi học')

@section('content')
<style>
    .session-detail-card {
        background: linear-gradient(120deg, #f0f6ff 0%, #e3f0ff 100%);
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(0,123,255,0.08);
        border: none;
        margin-bottom: 2rem;
        transition: box-shadow 0.2s;
    }
    .session-detail-card:hover {
        box-shadow: 0 8px 32px rgba(0,123,255,0.18);
    }
    .session-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #007bff;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }
    .session-info {
        font-size: 1.08rem;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .session-info i {
        color: #007bff;
        min-width: 22px;
        text-align: center;
    }
    .student-list {
        margin-top: 18px;
    }
    .student-list .list-group-item {
        border: none;
        border-radius: 8px;
        margin-bottom: 6px;
        background: #f8faff;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.05rem;
    }
    .student-list .list-group-item i {
        color: #00bcd4;
    }
    @media (max-width: 768px) {
        .session-detail-card { padding: 1rem !important; }
        .session-title { font-size: 1rem; }
    }
</style>
<div class="container mt-5">
    <h1 class="text-center mb-4"><i class="fas fa-info-circle me-2"></i>Chi Tiết Buổi Học</h1>
    <div class="card session-detail-card p-4">
        <div class="card-body">
            <div class="session-title"><i class="fas fa-chalkboard"></i> Lớp: {{ $session->lop->class_name }}</div>
            <div class="session-info"><i class="fas fa-clock"></i> Thời gian bắt đầu: {{ \Carbon\Carbon::parse($session->session_date)->format('H:i') }}</div>
            <div class="session-info"><i class="fas fa-hourglass-end"></i> Thời gian kết thúc: {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}</div>
            <div class="session-info"><i class="fas fa-user-tie"></i> Giáo viên: {{ $session->lop->teacher->first_name }} {{ $session->lop->teacher->last_name }}</div>
            <div class="session-info"><i class="fas fa-users"></i> Danh sách sinh viên:</div>
            <ul class="list-group student-list">
                @foreach($session->lop->enrollments as $enrollment)
                    <li class="list-group-item"><i class="fas fa-user-circle"></i> {{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
