@extends('layout.user-layout')

@section('header')
@include('admin.sidebar')
@endsection

@section('content')
<div class="container">
    <h2 class="my-4">Danh sách điểm danh sinh viên</h2>
    <div class="form-group">
        <label for="classSelect">Chọn lớp học:</label>
        <select class="form-control" id="classSelect">
            <option value="">Chọn lớp</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
    </div>
    <div id="studentAttendanceInfo"></div>
</div>

<div class="container">
  
        <h2 class="my-4">Danh sách điểm danh sinh viên</h2>
        < href="">Thêm</>
        <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Số lần điểm danh</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">{{ $student->id }}</th>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->attendances->count() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
    
@endsection