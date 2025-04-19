<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/user-layout.css') }}?v=1.0" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-3">
                <a href="/" class="d-flex align-items-center text-decoration-none">
                    <img src="/assets/Logo.png" alt="Logo website" style="width: 50px; height: 50px;">
                    <span class="ms-2 text-white fw-bold fs-5"> Student Attendance </span>
                </a>
            </div>
            <div class="col-md-9">
                <nav>
                    <ul class="nav justify-content-end menu-items">
                    {{-- <li class="nav-item"><a class="nav-link" href="document.pdf">Document</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="/">TRANG CHỦ</a></li>
                        @auth
                            @if (Auth::user()->role === 'STUDENT')
                                <li class="nav-item"><a class="nav-link" href="/hocsinh/lichhoc">Lịch học</a></li>
                            @elseif (Auth::user()->role === 'TEACHER')
                                <li class="nav-item"><a class="nav-link" href="/giaovien/lichday">Lịch dạy</a></li>
                            @elseif (Auth::user()->role === 'ADMIN')
                                <li class="nav-item"><a class="nav-link" href="/admin/hocsinh">Quản lý</a></li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->username }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ĐĂNG NHẬP') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('ĐĂNG KÝ') }}</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    <i class="fas fa-bars menu-icon"></i>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="content">
    @yield('content')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.menu-icon').click(function(){
            $('.menu-items').toggleClass('active');
        });
    });
</script>
</body>
</html>
