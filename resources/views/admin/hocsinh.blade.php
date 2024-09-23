@extends('layout.admin-layout')

@section('header')
<div class="col-md-2 sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/admin">Quản lí tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/admin/hocsinh">Quản lý học viên</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/giaovien">Quản lý giáo viên</a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="container table-container">
    <h1 class="mb-4">Danh sách học sinh</h1>

    <!-- Form Tìm Kiếm -->
    <form action="{{ url('/admin/hocsinh') }}" method="GET" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm học sinh" value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <a href="{{ url('/admin/hocsinh/create') }}" class="btn btn-primary mb-3">Thêm học sinh mới</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Ảnh</th> 
                <th>Điểm danh</th> <!-- Thêm cột mới -->
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->gender }}</td>
                    <td><img src="{{ url('assets/book') }}/{{ $student->img }}" alt="{{ $student->first_name }} {{ $student->last_name }}" width="50"></td>
                    <td><a href="{{ url('/admin/hocsinh/attendance', $student->student_id) }}" class="btn btn-info">Chi tiết</a></td> <!-- Nút chi tiết -->
                    <td class="action-buttons">
                        <a href="{{ url('/admin/hocsinh/edit', $student->student_id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ url('/admin/hocsinh/destroy', $student->student_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
</div>
@endsection
