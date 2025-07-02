{{-- @extends('layouts.app') --}}
@extends('layout.user-layout')

@section('title', 'Quên mật khẩu')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5 mx-auto">
        <div class="card auth-card p-4">
            <div class="text-center mb-4">
                <img src="/assets/Logo.png" alt="Logo" style="width: 60px; height: 60px;">
                <h2 class="mt-3 mb-1 fw-bold" style="color: #007bff;">Quên mật khẩu</h2>
                <p class="text-muted mb-0">Nhập email để nhận liên kết đặt lại mật khẩu</p>
            </div>
            <div class="card-body auth-form p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                                @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-primary btn-lg">Gửi liên kết đặt lại mật khẩu</button>
                        </div>
                    <div class="text-center mt-2">
                        <a class="form-link small" href="{{ route('login') }}">Quay lại đăng nhập</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
