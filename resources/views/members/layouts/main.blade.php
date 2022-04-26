<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/img/ecs-logo.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap-extended.css">
  <link rel="stylesheet" href="/css/style.css?modify={{ date("Ymdhis") }}">
  <link rel="stylesheet" href="/css/icons.css?modify={{ date("Ymdhis") }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <title>{{ $title }} - ECS Laboratory</title>
</head>

<body>
<!--start wrapper-->
<div class="wrapper">

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-0 border-bottom">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="/img/ecs-logo.png" width="100" alt=""/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @auth
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Halo, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item {{ Request::is('profil') ? 'active' : '' }}" href="/profil">Edit Profil</a></li>
                <li><a class="dropdown-item {{ Request::is('password') ? 'active' : '' }}" href="/password">Ubah Password</a></li>
              </ul>
            </li>
            <li class="nav-item mx-2">
              <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li class="nav-item mx-2">
              <a href="/progress" class="nav-link {{ Request::is('progress') ? 'active' : '' }}">Progress</a>
            </li>

            @if (auth()->user()->roles != 'Member')
            <li class="nav-item mx-2">
              <a href="/admin" class="nav-link">Admin</a>
            </li>
            @endif
            
            <li class="nav-item mx-2">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm px-4 radius-30">Logout</button>
              </form>
            </li>
          </ul>
          @else
          <div class="ms-auto d-flex justify-content-center gap-3">
            <a href="/login" class="btn btn-primary btn-sm px-4 radius-30">Login</a>
            <a href="/register" class="btn btn-white btn-sm px-4 radius-30">Register</a>
          </div>
          @endauth
        </div>
      </div>
    </nav>
  </header>

  <!--start content-->
  @yield('content')
  <!--end page main-->

  <footer class="bg-white border-top p-3 text-center fixed-bottom">
    <p class="mb-0">Copyright by ECS Laboratory © 2022. All right reserved.</p>
  </footer>

</div>
<!--end wrapper-->

<!--plugins-->
<script src="/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/jquery/dist/jquery.js"></script>
<script src="/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="/js/notif.js?modify={{ date('Ymd') }}"></script>
<script src="/js/script.js?modify={{ date('Ymd') }}"></script>

</body>

</html>