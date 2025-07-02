@extends('layout.user-layout')

@section('title', 'Lịch học')

@section('content')
<style>
    .schedule-card {
        background: linear-gradient(120deg, #f0f6ff 0%, #e3f0ff 100%);
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(0,123,255,0.08);
        border: none;
        margin-bottom: 2rem;
        transition: box-shadow 0.2s;
    }
    .schedule-card:hover {
        box-shadow: 0 8px 32px rgba(0,123,255,0.18);
    }
    .schedule-date {
        font-size: 1.2rem;
        font-weight: 700;
        color: #007bff;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .schedule-list .list-group-item {
        border: none;
        border-radius: 12px;
        margin-bottom: 10px;
        box-shadow: 0 2px 8px rgba(0,123,255,0.04);
        transition: box-shadow 0.2s, background 0.2s;
    }
    .schedule-list .list-group-item:hover {
        background: #e3f0ff;
        box-shadow: 0 4px 16px rgba(0,123,255,0.10);
    }
    .schedule-class-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c387e;
        margin-bottom: 2px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .schedule-time {
        color: #007bff;
        font-weight: 500;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .schedule-btn {
        background: linear-gradient(90deg, #007bff, #00bcd4);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background 0.2s, transform 0.2s;
    }
    .schedule-btn:hover {
        background: linear-gradient(90deg, #00bcd4, #007bff);
        transform: translateY(-2px);
    }
    @media (max-width: 768px) {
        .schedule-card { padding: 1rem !important; }
        .schedule-date { font-size: 1rem; }
    }
</style>
<div class="container mt-5">
    <h1 class="text-center mb-4"><i class="fas fa-calendar-alt me-2"></i>Lịch Học</h1>
    @foreach($groupedSessions as $date => $sessions)
    @php
        $carbonDate = \Carbon\Carbon::parse($date);
    @endphp
    <div class="card schedule-card p-3">
        <div class="card-header bg-white border-0 mb-2 schedule-date">
            <i class="fas fa-calendar-day"></i> {{ $carbonDate->isoFormat('dddd, DD/MM/YYYY') }} 
        </div>
        <div class="card-body p-0 schedule-list">
            <ul class="list-group">
                @foreach($sessions as $session)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="schedule-class-title"><i class="fas fa-chalkboard"></i> Lớp: {{ $session->lop->class_name }}</div>
                            <div class="schedule-time"><i class="fas fa-clock"></i> Bắt đầu: {{ \Carbon\Carbon::parse($session->session_date)->format('H:i') }}</div>
                            <div class="schedule-time"><i class="fas fa-hourglass-end"></i> Kết thúc: {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}</div>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ url('/hocsinh/lichhoc/' . $session->session_id) }}" class="btn btn-primary schedule-btn"><i class="fas fa-info-circle me-1"></i> Xem chi tiết</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
