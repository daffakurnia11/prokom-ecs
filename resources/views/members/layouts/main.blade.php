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
          <div class="ms-auto d-flex justify-content-center flex-column flex-sm-row align-items-center gap-3">
            <span>Halo, {{ auth()->user()->name }}</span>
            @if (auth()->user()->roles != 'Member')
            <a href="/admin" class="btn btn-white btn-sm px-4 radius-30">Admin</a>
            @endif
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="btn btn-primary btn-sm px-4 radius-30">Logout</button>
            </form>
          </div>
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