<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css">
  <link href="{{ asset('css/admin-layout.css') }}?v=1.0" rel="stylesheet">
</head>
<body>

  <div class="container-fluid">
      <h4>Welcome, {{ auth()->user()->username }}</h4>
      <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
      </form>
      <div class="row">
        @yield('header')
        <div class="col-md-10 main-content">
          @yield('content')
        </div>


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVFQWjT+8hmiI3PpIFfrz5WOMNmFC5aLnQBzLt44q6RL3YzTcsQ2" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>
</html>
