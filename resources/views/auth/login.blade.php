@extends('layout.user-layout')

@section('title', 'Đăng nhập')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5 mx-auto">
        <div class="card auth-card p-4">
            <div class="text-center mb-4">
                <img src="/assets/Logo.png" alt="Logo" style="width: 60px; height: 60px;">
                <h2 class="mt-3 mb-1 fw-bold" style="color: #007bff;">Đăng nhập</h2>
                <p class="text-muted mb-0">Chào mừng bạn đến với hệ thống điểm danh sinh viên</p>
            </div>
            <div class="card-body auth-form p-0">
                    <form method="POST" action="{{ route('login') }}">
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
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                                @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                                </div>
                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
                            </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                                @if (Route::has('password.request'))
                            <a class="form-link small" href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                @endif
                        <a class="form-link small" href="{{ route('register') }}">Đăng ký tài khoản</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
