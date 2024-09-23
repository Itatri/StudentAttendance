

@extends('layout.admin-layout')

@section('header')
  <div class="col-md-2 sidebar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/admin">Quản lí tài khoản</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/admin/hocsinh">Quản lý học sinh</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/giaovien">Quản lý giáo viên</a>
            </li>
          </ul>
  </div>
@endsection

@section('content')
<div class="container">
        <h2 class="my-4">Danh sách tài khoản</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Trình độ</th>
                    <th scope="col">Loại đào tạo</th>
                    <th scope="col">Ngành học</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>

                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->student_id }}</th>
                    <td>{{ $student->firt_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->education_level }}</td>
                    <td>{{ $student->traning_type }}</td>
                    <td>{{ $student->major }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td><a href="">Sửa</a></td>
                    <td><a href="">Xóa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection