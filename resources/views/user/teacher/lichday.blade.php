@extends('layout.user-layout')

@section('title', 'Lịch dạy')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lịch Dạy</h1>
    <div class="row">
        @foreach($dates as $date)
            @php
                $isToday = \Carbon\Carbon::parse($date->date)->isToday();
                $sessions = \App\Models\BuoiHoc::whereDate('session_date', $date->date)->get();
                $sessionCount = $sessions->count();
            @endphp
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 {{ $isToday ? 'border-primary bg-primary text-white' : '' }}">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar-alt fa-2x me-2 {{ $isToday ? 'text-white' : 'text-primary' }}"></i>
                            <h5 class="card-title mb-0 flex-grow-1">
                                <a href="{{ route('teacher.schedule.date', ['date' => $date->date]) }}" style="text-decoration: none; color: inherit;">
                                    {{ \Carbon\Carbon::parse($date->date)->isoFormat('dddd, DD/MM/YYYY') }}
                                </a>
                            </h5>
                            @if($isToday)
                                <span class="badge bg-warning text-dark ms-2">Hôm nay</span>
                            @endif
                        </div>
                        <p class="card-text mb-2">
                            <span class="badge bg-info text-dark">{{ $sessionCount }} buổi dạy</span>
                        </p>
                        <ul class="list-group list-group-flush mb-3">
                            @foreach($sessions as $session)
                                <li class="list-group-item {{ $isToday ? 'bg-primary text-white' : '' }}">
                                    <strong>Tiết:</strong> {{ $session->session_number ?? 'N/A' }}
                                    <span class="ms-2"><strong>Môn:</strong> {{ $session->subject_name ?? '---' }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('teacher.schedule.date', ['date' => $date->date]) }}" class="btn btn-outline-{{ $isToday ? 'light' : 'primary' }} w-100">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
