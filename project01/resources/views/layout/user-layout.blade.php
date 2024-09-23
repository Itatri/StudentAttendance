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
    
    <style>
        /* Custom CSS can be added here */
        .content{
            margin-top:40px;
            margin-bottom:40px;
        }
        .header {
            background-color: #ff38667d;
            color: #fff;
            padding: 10px 0;
        }

        .header h1 {
            margin: 0;
        }

        .header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: right;
        }

        .header ul li {
            display: block; /* Change to display block */
            margin-bottom: 10px; /* Add margin bottom for spacing */
        }

        .header ul li a {
            color: #000;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: 550;
        }

        .header ul li a:hover {
            text-decoration: underline;
            font-weight: bold;
            color: #000;
        }
        
        i.fas.fa-bars.menu-icon {
            display: none;
        }
        
        .cart-icon {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
        }

        .dropdown-menu {
            background-color: #333;
        }

        .dropdown-menu a {
            color: #fff;
        }

        .dropdown-menu a:hover {
            background-color: #e83e8c;
        }

        .nav-link:hover {
            display: block;
        }
        
        .schedule-table th, .schedule-table td {
            text-align: center;
            vertical-align: middle;
        }
        
        .schedule-table th {
            background-color: #f8f9fa;
        }
        
        .schedule-table .time-slot {
            width: 150px;
        }
        
        .schedule-table .class-details {
            background-color: #e9ecef;
        }

        /* Media queries for responsive design */
        @media (max-width: 768px) {
            i.fas.fa-bars.menu-icon {
                display: block;
            }
            
            .header ul {
                display: none;
            }

            .menu-icon {
                display: block;
                color: #fff;
                text-align: right;
                cursor: pointer;
            }
            
            .menu-items {
                display: none;
                background-color: #3333; /* Optional: Add background color to menu items */
                padding: 20px; /* Optional: Add padding to menu items */
                position: relative; /* Đặt vị trí tuyệt đối */
                width: 100%; /* Chiều rộng tương ứng với dropdown parent */
            }
            
            .dropdown-menu.show {
                top: 208px;
                right: 30%;
            }
            
            .menu-items.active {
                display: block;
            }

            .menu-items.active li {
                display: block; /* Change to display block */
                margin-bottom: 10px; /* Add margin bottom for spacing */
            }

            .menu-items.active a {
                padding: 10px 0; /* Optional: Remove horizontal padding from links */
                display: block; /* Optional: Display links as block */
            }
        }

        /* ============================================================================================ */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .filters {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .filters form {
            display: flex;
            margin-right: 10px;
        }

        .filters form label {
            margin-right: 10px;
        }

        select,
        input[type="number"] {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .product-list {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 0;
            margin: 0;
        }

        .product-list li {
            width: calc(25% - 10px); /* Adjust width based on desired columns */
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .product-list li:hover {
            transform: scale(1.02); /* Add subtle hover effect */
        }

        .product-list li img {
            width: 100%; /* Adjust image width if needed */
            display: block;
            margin-bottom: 10px;
        }

        .product-list li h2 {
            margin-top: 0;
            font-size: 18px;
        }

        .product-list li p {
            margin-top: 5px;
            color: #333;
        }

        /* Placeholder styles for ratings (replace with actual implementation) */
        .product-list li .ratings {
            display: flex;
            margin-top: 5px;
        }

        .product-list li .ratings i {
            color: #f9c733;
            font-size: 16px
        }

        .card {
            height: 100%;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .card {
                margin: 0 auto;
            }

            .filters {
                flex-direction: column; /* Stack elements vertically on small screens */
            }
        }

        @media (min-width: 768px) and (max-width: 1400px) {
            .row {
                flex-direction: row;
            }

            .filters {
                flex-direction: column; /* Stack elements vertically on small screens */
            }
            
            .col-md-3, .col-sm-6 {
                flex: 0 0 50%;
            }
        }
    </style>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-3">
                <a href="/">
                    <img src="/assets/Logo.png" alt="Logo website" style="width: 30px; height: 30px;">
                </a>
            </div>
            <div class="col-md-9">
                <nav>
                    <ul class="nav justify-content-end menu-items">
                    <li class="nav-item"><a class="nav-link" href="document.pdf">Document</a></li>
                        <li class="nav-item"><a class="nav-link" href="/">Trang chủ</a></li>
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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
