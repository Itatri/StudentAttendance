@extends('layout.user-layout')

@section('header')
@include('admin.sidebar')
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">Chi tiết điểm danh của {{ $student->first_name }} {{ $student->last_name }}</h1>

    @if($attendanceDetails)
        @foreach($attendanceDetails as $className => $details)
            <h2>Lớp: {{ $className }}</h2>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Số buổi đã điểm danh</th>
                        <th>Số buổi chưa điểm danh</th>
                        <th>Tổng số buổi học</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $details['present'] }}</td>
                        <td>{{ $details['absent'] }}</td>
                        <td>{{ $details['total'] }}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    @else
        <p>Không có dữ liệu điểm danh cho học viên này.</p>
    @endif
</div>
@endsection
