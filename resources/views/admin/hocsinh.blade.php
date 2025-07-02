@extends('layout.user-layout')

@section('header')
@include('admin.sidebar')
@endsection

@section('content')
<style>
    .admin-sidebar-list .nav-link {
        color: #465596;
        font-weight: 500;
        border-radius: 8px;
        transition: background 0.2s, color 0.2s;
    }
    .admin-sidebar-list .nav-link.active, .admin-sidebar-list .nav-link:hover {
        background: linear-gradient(90deg, #007bff, #00bcd4);
        color: #fff;
    }
    .table-container {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(0,123,255,0.08);
        padding: 32px 24px;
        margin-top: 18px;
    }
    .table thead th {
        background: linear-gradient(90deg, #465596 0%, #007bff 100%);
        color: #fff;
        font-weight: 600;
        border: none;
    }
    .table tbody tr {
        transition: background 0.2s;
    }
    .table tbody tr:hover {
        background: #f0f6ff;
    }
    .student-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #007bff;
        box-shadow: 0 2px 8px rgba(0,123,255,0.08);
    }
    .action-buttons .btn {
        border-radius: 8px;
        font-weight: 500;
        margin: 0 2px;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    }
    .action-buttons .btn-warning { color: #fff; background: #ffc107; border: none; }
    .action-buttons .btn-warning:hover { background: #ff9800; }
    .action-buttons .btn-danger { color: #fff; background: #e83e8c; border: none; }
    .action-buttons .btn-danger:hover { background: #c82333; }
    .action-buttons .btn-info { color: #fff; background: #00bcd4; border: none; }
    .action-buttons .btn-info:hover { background: #007bff; }
    .btn-add-student {
        background: linear-gradient(90deg, #007bff, #00bcd4);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        margin-bottom: 18px;
        transition: background 0.2s, transform 0.2s;
    }
    .btn-add-student:hover {
        background: linear-gradient(90deg, #00bcd4, #007bff);
        transform: translateY(-2px);
    }
    .form-inline .form-control {
        border-radius: 8px;
        margin-right: 8px;
    }
    .form-inline .btn-primary {
        border-radius: 8px;
        background: linear-gradient(90deg, #007bff, #00bcd4);
        border: none;
        font-weight: 600;
    }
    .form-inline .btn-primary:hover {
        background: linear-gradient(90deg, #00bcd4, #007bff);
    }
    @media (max-width: 991.98px) {
        .table-container { padding: 10px 2px; margin-top: 8px; }
        .admin-sidebar-list { padding: 0 2px; }
    }
    @media (max-width: 767.98px) {
        .table-responsive { font-size: 0.95rem; }
        .table-container { padding: 4px 0; }
    }
</style>
<div class="container table-container">
    <h1 class="mb-4"><i class="fas fa-users me-2"></i>Danh sách học sinh</h1>
    <!-- Form Tìm Kiếm -->
    <form action="{{ url('/admin/hocsinh') }}" method="GET" class="form-inline mb-3 d-flex align-items-center gap-2">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm học sinh" value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
    </form>
    <a href="{{ url('/admin/hocsinh/create') }}" class="btn btn-add-student"><i class="fas fa-user-plus me-1"></i> Thêm học sinh mới</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Ảnh</th> 
                    <th>Điểm danh</th>
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
                        <td><img src="{{ url('assets/book') }}/{{ $student->img }}" alt="{{ $student->first_name }} {{ $student->last_name }}" class="student-avatar"></td>
                        <td><a href="{{ url('/admin/hocsinh/attendance', $student->student_id) }}" class="btn btn-info"><i class="fas fa-clipboard-list"></i> Chi tiết</a></td>
                    <td class="action-buttons">
                            <a href="{{ url('/admin/hocsinh/edit', $student->student_id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                        <form action="{{ url('/admin/hocsinh/destroy', $student->student_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
</div>
@endsection
