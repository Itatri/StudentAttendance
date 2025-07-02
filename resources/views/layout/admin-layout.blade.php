<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin-layout.css') }}?v=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    .admin-header {
      background: linear-gradient(90deg, #465596 0%, #007bff 100%);
      color: #fff;
      border-radius: 0 0 18px 18px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      padding: 18px 32px 12px 32px;
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .admin-header .admin-logo {
      width: 48px; height: 48px; border-radius: 12px; margin-right: 12px;
    }
    .admin-header .admin-title {
      font-size: 1.5rem; font-weight: 700; letter-spacing: 1px;
    }
    .admin-header .admin-user {
      font-size: 1.1rem; font-weight: 500;
    }
    .admin-header .logout-btn {
      background: linear-gradient(90deg, #e83e8c, #ff6a00); color: #fff; border: none; border-radius: 8px; padding: 6px 18px; font-weight: 600; transition: background 0.2s;
    }
    .admin-header .logout-btn:hover {
      background: linear-gradient(90deg, #ff6a00, #e83e8c); color: #fff;
    }
    @media (max-width: 768px) {
      .admin-header { flex-direction: column; align-items: flex-start; padding: 18px 10px; }
      .admin-header .admin-title { font-size: 1.1rem; }
    }
  </style>
</head>
<body>
  <div class="admin-header">
    <div class="d-flex align-items-center">
      <img src="/assets/Logo.png" alt="Logo" class="admin-logo">
      <span class="admin-title">Quản trị hệ thống - Student Attendance</span>
    </div>
    <div class="d-flex align-items-center gap-3">
      <span class="admin-user"><i class="fas fa-user-shield me-1"></i> {{ auth()->user()->username }}</span>
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
        <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt me-1"></i>Logout</button>
      </form>
    </div>
  </div>
  <div class="container-fluid">
      <div class="row flex-nowrap">
        @yield('header')
        <div class="col-12 col-lg-10 main-content">
          @yield('content')
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
