{{-- @extends('layouts.app') --}}
@extends('layout.user-layout')

@section('title', 'Đăng ký')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="col-md-7 col-lg-6 mx-auto">
        <div class="card auth-card p-4">
            <div class="text-center mb-4">
                <img src="/assets/Logo.png" alt="Logo" style="width: 60px; height: 60px;">
                <h2 class="mt-3 mb-1 fw-bold" style="color: #007bff;">Đăng ký tài khoản</h2>
                <p class="text-muted mb-0">Tạo tài khoản để sử dụng hệ thống điểm danh sinh viên</p>
            </div>
            <div class="card-body auth-form p-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                                @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                                @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                                @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Nhập lại mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
                            </div>
                    <div class="text-center mt-2">
                        <a class="form-link small" href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
