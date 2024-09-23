<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css">
  <style>
    /* Body & Background */
    body {
      font-family: Open Sans, sans-serif;
      background-color: #f2f5f7; /* Light gray background */
      color: #343a40; /* Dark text color */
    }

    /* Navigation Bar */
    .navbar {
      background-color: #fff; /* White navbar background */
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .navbar-brand {
      color: #343a40; /* Brand name color */
      font-weight: bold; /* Bold brand name */
    }

    .nav-link {
      color: #343a40; /* Text color for links */
      padding: 1rem;
    }

    .nav-link:hover {
      background-color: #e9ecef; /* Light hover effect */
    }

    .nav-link.active {
      background-color: #dee2e6; /* More prominent active state */
      font-weight: bold; /* Bold active link */
    }

    /* Sidebar */
    .sidebar {
      width: 250px; /* Adjusted sidebar width */
      background-color: #eef0f1; /* Slightly lighter background */
      color: #343a40; /* Text color for sidebar items */
      height: 100vh; /* Full viewport height */
      padding: 20px;
    }

    /* Main Content */
    .main-content {
      padding: 20px;
      min-height: 100vh; /* Set minimum height for content area */
    }

    .main-content h1 {
      color: #343a40; /* Title color */
    }

    .main-content p {
      color: #666; /* Subdued text color */
    }

    /* Cards */
    .card {
      margin-bottom: 20px;
      border-radius: 5px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle card shadow */
    }

    .card-header {
      background-color: #f8f9fa; /* Light card header background */
      padding: 10px 15px;
      font-weight: bold;
    }

    .card-body {
      padding: 15px;
    }
    .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .table-container {
            max-width: 900px;
            margin: 20px auto;
        }
        .table th, .table td {
            text-align: center;
        }
        .action-buttons {
            display: flex;
            justify-content: space-around;
        }
        .action-buttons form {
            display: inline;
        }
        .table-container {
        max-width: 900px;
        margin: 20px auto;
    }
    .table th, .table td {
        text-align: center;
    }
    .action-buttons {
        display: flex;
        justify-content: space-around;
    }
    .action-buttons form {
        display: inline;
    }
    /* You can add icons using CSS or icon libraries */
  </style>
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
