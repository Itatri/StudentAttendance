@extends('layout.user-layout')

@section('title', 'Điểm danh lớp')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Điểm Danh Lớp</h1>
    <form method="POST" action="{{ route('teacher.attendance.save', ['session_id' => $session_id]) }}">
    @csrf
    <input type="hidden" name="date" value="{{ $date }}">
    <input type="hidden" name="session_id" value="{{ $session_id }}">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và Tên</th>
                    <th>Điểm Danh (Có mặt, Vắng, Trễ)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    @php
                        $status = $attendanceStatus[$student->student_id] ?? 'absent'; // Default status is 'absent'
                    @endphp
                    <tr>
                        <td>{{ $student->student->student_id }}</td>
                        <td>{{ $student->student->first_name }} {{ $student->student->last_name }}</td>
                        <td>
                            <select name="attendance[{{ $student->student_id }}]" class="form-control">
                                <option value="present" {{ $status == 'present' ? 'selected' : '' }}>Có mặt</option>
                                <option value="absent" {{ $status == 'absent' ? 'selected' : '' }}>Vắng</option>
                                <option value="late" {{ $status == 'late' ? 'selected' : '' }}>Trễ</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
