@extends('layout.user-layout')

@section('title', 'Lịch học')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lịch Học</h1>
    @foreach($groupedSessions as $date => $sessions)
    @php
        $carbonDate = \Carbon\Carbon::parse($date);
    @endphp
    <div class="card mb-3">
        <div class="card-header">{{ $carbonDate->isoFormat('dddd, DD/MM/YYYY') }} </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($sessions as $session)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Lớp: {{ $session->lop->class_name }}</h5>
                            <p class="card-text">Thời gian bắt đầu: {{ \Carbon\Carbon::parse($session->session_date)->format('H:i') }}</p>
                            <p class="card-text">Thời gian kết thúc: {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ url('/hocsinh/lichhoc/' . $session->session_id) }}" class="btn btn-primary">Xem chi tiết</a>
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
