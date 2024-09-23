@extends('layout.user-layout')

@section('title', 'Chi tiết buổi học')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Chi Tiết Buổi Học</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Lớp: {{ $session->lop->class_name }}</h5>
            <p class="card-text">Thời gian bắt đầu: {{ \Carbon\Carbon::parse($session->session_date)->format('H:i') }}</p>
            <p class="card-text">Thời gian kết thúc: {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}</p>
            <h6 class="card-subtitle mb-2 text-muted">Giáo viên: {{ $session->lop->teacher->first_name }} {{ $session->lop->teacher->last_name }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Danh sách sinh viên:</h6>
            <ul class="list-group">
                @foreach($session->lop->enrollments as $enrollment)
                    <li class="list-group-item">{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
