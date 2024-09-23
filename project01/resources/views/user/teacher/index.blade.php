@extends('layout.user-layout')

@section('title')
Trang Chủ
@endsection

@section('content')
<!-- Add your content here -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thông Tin Giáo Viên</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url('assets/book') }}/{{ $profile->img }}" alt="Ảnh Giáo Viên" class="img-fluid rounded-circle shadow">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Mã giáo viên:</strong> {{$profile->teacher_id}} </p>
                            <p class="card-text"><strong>Họ tên:</strong> {{$profile->first_name}} {{$profile->last_name}} </p>
                            <p class="card-text"><strong>Giới tính:</strong> {{$profile->gender}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Trình độ:</strong> {{$profile->education_level}}</p>
                            <p class="card-text"><strong>Ngày sinh:</strong> {{$profile->date_of_birth}} </p>
                            <p class="card-text"><strong>Nơi sinh:</strong> {{$profile->address}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
@endsection
