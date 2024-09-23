@extends('layout.user-layout')

@section('title', 'Buổi dạy ngày ' . \Carbon\Carbon::parse($date)->format('d-m-Y'))

@section('content')

<div class="container mt-5">

    <h1 class="text-center mb-4">Buổi Dạy Ngày {{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}</h1>

    <div class="container mt-5">
    <h1 class="text-center mb-4">Lịch Dạy</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Lớp</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                <tr>
                    <td>{{ $session->lop->class_name }}</td>
                    <td>{{ $session->session_date }}</td>
                    <td>{{ $session->end_time }}</td>
                    <td>
                        <a href="{{ url('/giaovien/lichday/' . $date . '/' . $session->session_id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</div>

@endsection
