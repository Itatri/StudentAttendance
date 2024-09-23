

@extends('layout.admin-layout')

@section('header')
<div class="col-md-2 sidebar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/admin">Quản lí tài khoản</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/admin/hocsinh">Quản lý học viên</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/admin/giaovien">Quản lý giáo viên</a>
            </li>
          </ul>
  </div>
@endsection

@section('content')
<div class="container">
        <h2 class="my-4">Danh sách giáo viên</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Trình độ</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <th scope="row">{{ $teacher->teacher_id }}</th>
                    <td>{{ $teacher->firt_name }} {{ $teacher->last_name }}</td>
                    <td>{{ $teacher->date_of_birth }}</td>
                    <td>{{ $teacher->gender }}</td>
                    <td>{{ $teacher->education_level }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->phone_number }}</td>
                    <td><a href="">Sửa</a></td>
                    <td><a href="">Xóa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection