@extends('layouts.app')
@section('content')
<style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: #fff;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
    }
    .main-content {
      padding: 20px;
    }
    .widget {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
    <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <div class="col-md-2 sidebar">
            <h3 class="text-center py-3">Dashboard</h3>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.index') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Products</a>
              </li>
            </ul>
          </div>

          <!-- Main Content -->
          <div class="col-md-10 main-content">
            <h1>{{ $title }}</h1>
            {{ $slot }}
          </div>
        </div>
      </div>
@endsection
