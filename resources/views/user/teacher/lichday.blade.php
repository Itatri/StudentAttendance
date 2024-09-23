@extends('layout.user-layout')

@section('title', 'Lịch dạy')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lịch Dạy</h1>
    <div class="row">
        @foreach($dates as $date)
            @php
                // Kiểm tra xem ngày hiện tại có phải là ngày hiện tại không
                $isToday = \Carbon\Carbon::parse($date->date)->isToday();
                
                // Lấy session_id của buổi học đầu tiên trong ngày
                $firstSession = \App\Models\BuoiHoc::whereDate('session_date', $date->date)->first();
                $session_id = $firstSession ? $firstSession->id : null;
            @endphp
            <div class="col-md-4 mb-3">
                <div class="card {{ $isToday ? 'border-primary' : '' }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('teacher.schedule.date', ['date' => $date->date]) }}" style="text-decoration: none; color: {{ $isToday ? 'white' : 'black' }}">
                                {{ \Carbon\Carbon::parse($date->date)->isoFormat('dddd, DD/MM/YYYY') }}
                            </a>
                        </h5>
                        <p class="card-text">Số buổi dạy: {{ \App\Models\BuoiHoc::whereDate('session_date', $date->date)->count() }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
