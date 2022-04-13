@extends('members.layouts.main')

@section('content')
    
<!--start content-->
<main class="authentication-content">
  <div class="container">
    <div class="mt-4">
      <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
        <div class="row g-0">
          <div class="col-12 order-1 col-xl-8 col-lg-6 d-md-flex align-items-center justify-content-center border-end">
            <img src="/img/auth-img-7.png" class="d-none d-lg-block img-fluid" alt="">
          </div>
          <div class="col-12 col-xl-4 col-lg-6 order-md-2">
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title">Login</h5>
              <p class="card-text mb-4">Silakan masuk menggunakan akun pribadi!</p>

              @if(session()->has('message') && session('message') == 'Register success')
              <div class="alert alert-success alert-dismissible fade show radius-30 ps-4" role="alert">
                Registrasi berhasil!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if(session()->has('message') && session('message') == 'Logout success')
              <div class="alert alert-success alert-dismissible fade show radius-30 ps-4" role="alert">
                Logout berhasil!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if(session()->has('message') && session('message') == 'Login failed')
              <div class="alert alert-danger alert-dismissible fade show radius-30 ps-4" role="alert">
                Email atau password salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              
              @if(session()->has('message') && session('message') == 'Not Verified')
              <div class="alert alert-danger alert-dismissible fade show radius-30 ps-4" role="alert">
                Akun anda belum di verifikasi.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              <form action="/login" method="POST" class="form-body">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                    <input type="email" class="form-control @error('email') is-invalid @enderror radius-30 ps-5" id="email" name="email" placeholder="Masukkan email kamu" value="{{ old('email') }}">
                  </div>
                  @error('email')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror radius-30 ps-5" id="password" name="password" placeholder="Masukkan password">
                  </div>
                  @error('password')
                  <small class="text-danger">
                    {{ $message }}
                  </small>
                  @enderror
                </div>
                <div class="mb-3 text-end">	
                  <a href="authentication-forgot-password.html">Lupa Password ?</a>
                </div>
                <div class="mb-3">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                  </div>
                </div>
                <div class="mb-3 text-center">
                  <p class="mb-0">Belum punya akun? <a href="/register">Register disini</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--end page main-->

@endsection