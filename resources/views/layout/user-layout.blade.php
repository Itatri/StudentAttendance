<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/user-layout.css') }}?v=1.0" rel="stylesheet">
    <style>
        .navbar-gradient {
            background: linear-gradient(90deg, #465596 0%, #007bff 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-radius: 0 0 18px 18px;
        }
        .navbar-logo {
            width: 48px; height: 48px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .navbar-brand-text {
            color: #fff; font-weight: 700; font-size: 1.3rem; letter-spacing: 1px;
        }
        .nav-link, .dropdown-toggle {
            color: #fff !important; font-weight: 500; font-size: 1.05rem;
            transition: color 0.2s, background 0.2s;
        }
        .nav-link:hover, .dropdown-toggle:hover {
            color: #ffd700 !important; background: rgba(255,255,255,0.08);
            border-radius: 8px;
        }
        .dropdown-menu {
            border-radius: 12px; min-width: 160px; box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        }
        .dropdown-item {
            color: #333; font-weight: 500;
        }
        .dropdown-item:hover {
            background: #007bff; color: #fff;
        }
        .navbar-avatar {
            width: 36px; height: 36px; border-radius: 50%; object-fit: cover; margin-right: 8px;
            border: 2px solid #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .logout-btn {
            color: #fff; background: linear-gradient(90deg, #e83e8c, #ff6a00); border: none; border-radius: 8px; padding: 6px 18px; font-weight: 600; transition: background 0.2s;
        }
        .logout-btn:hover {
            background: linear-gradient(90deg, #ff6a00, #e83e8c); color: #fff;
        }
        @media (max-width: 991px) {
            .navbar-collapse {
                background: linear-gradient(90deg, #465596 0%, #007bff 100%);
                border-radius: 0 0 18px 18px;
                margin-top: 10px;
            }
            .nav-link, .dropdown-toggle {
                color: #fff !important;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-gradient py-2 px-2 mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/assets/Logo.png" alt="Logo website" class="navbar-logo">
            <span class="ms-2 navbar-brand-text">Student Attendance</span>
                </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item"><a class="nav-link" href="/">TRANG CHỦ</a></li>
                        @auth
                            @if (Auth::user()->role === 'STUDENT')
                        <li class="nav-item"><a class="nav-link" href="/hocsinh/lichhoc"><i class="fas fa-calendar-alt me-1"></i> Lịch học</a></li>
                            @elseif (Auth::user()->role === 'TEACHER')
                        <li class="nav-item"><a class="nav-link" href="/giaovien/lichday"><i class="fas fa-chalkboard-teacher me-1"></i> Lịch dạy</a></li>
                            @elseif (Auth::user()->role === 'ADMIN')
                        <li class="nav-item"><a class="nav-link" href="/admin/hocsinh"><i class="fas fa-users-cog me-1"></i> Quản lý</a></li>
                            @endif
                            <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/assets/teacher_images/{{ Auth::user()->avatar ?? 'Hoàng Văn Trí.jpg' }}" class="navbar-avatar" alt="avatar">
                            <span>{{ Auth::user()->username }}</span>
                                </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    <button type="submit" class="dropdown-item logout-btn"><i class="fas fa-sign-out-alt me-2"></i>Đăng xuất</button>
                                    </form>
                            </li>
                        </ul>
                                </li>
                        @endauth
                    </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    @hasSection('header')
    <div class="row flex-nowrap">
        <div class="col-12 col-lg-2 p-0">
            @yield('header')
        </div>
        <div class="col-12 col-lg-10">
            @yield('content')
        </div>
    </div>
    @else
    <div class="content">
        @yield('content')
    </div>
    @endif
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
