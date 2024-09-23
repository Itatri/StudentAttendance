@extends('layout.admin-layout')

@section('header')
<div class="col-md-2 sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="/admin">Quản lí tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/admin/giaovien">Quản lý giáo viên</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/hocsinh">Quản lý học sinh</a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="container table-container">
    <h2 class="my-4">Danh sách giáo viên</h2>

    <!-- Form Tìm Kiếm -->
    <form action="{{ url('/admin/giaovien') }}" method="GET" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm giáo viên" value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

 
    {{-- <a href="{{ url('/admin/giaovien/create') }}" class="btn btn-primary mb-3">Thêm giáo viên mới</a> --}}
    <a href="{{ url('/admin/giaovien/create') }}" class="btn btn-primary mb-3">Thêm giáo viên mới</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Trình độ</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>

           
           
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->teacher_id }}</td>
                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                    <td>{{ $teacher->date_of_birth }}</td>
                    <td>{{ $teacher->gender }}</td>
                    <td>{{ $teacher->education_level }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->phone_number }}</td>
               
                    {{-- <td><img src="{{ url('assets/teacher_images') }}/{{ $teacher->img }}" alt="{{ $teacher->first_name }} {{ $teacher->last_name }}" class="teacher-img"></td> --}}
                    <td><img src="{{ url('assets/teacher_images') }}/{{ $teacher->img }}" alt="{{ $teacher->first_name }} {{ $teacher->last_name }}" width="50"></td>

                    <td class="action-buttons">
                        {{-- <a href="{{ url('/admin/giaovien/edit', $teacher->teacher_id) }}" class="btn btn-warning">Sửa</a> --}}
                        <a href="{{ url('/admin/giaovien/edit', $teacher->teacher_id) }}" class="btn btn-warning">Sửa</a>

                        {{-- <form action="{{ route('admin.giaovien.destroy', $teacher->teacher_id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giáo viên này không?')"> --}}
                            <form action="{{ url('/admin/giaovien/destroy', $teacher->teacher_id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Xóa</button>
                      </form>
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
           {{-- <!-- Hiển thị các liên kết phân trang -->
    <div class="d-flex justify-content-center">
        {{ $teacher->links() }}
  --}}
    </div>
</div>
@endsection
