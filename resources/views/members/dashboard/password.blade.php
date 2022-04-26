@extends('members.layouts.main')

@section('content')
    
<!--start content-->
<main id="dashboard">
  <div class="container mb-5 py-3">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        @include('members.layouts.profile_data')
      </div>
      <div class="col-xl-9 col-lg-8">
        <div class="card rounded shadow-sm py-4 px-5">
          <h5 class="card-title mt-3">Ubah Password</h5>
          <p class="card-text mb-0">Lengkapi dan isi data diri kamu melalui form dibawah!</p>
          <hr>

          @if(session()->has('message') && session('message') == 'Password updated')
          <div class="alert alert-success alert-dismissible fade show radius-30 ps-4" role="alert">
            Password berhasil diubah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('message') && session('message') == 'Profile empty')
          <div class="alert alert-danger alert-dismissible fade show radius-30 ps-4" role="alert">
            Silakan lengkapi profil dulu!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <div class="card-body px-0 pt-0">
            <form action="/password/{{ auth()->user()->student_number }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <h5 class="fs-6 mt-3">Pengaturan Password</h5>
              
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                      <input readonly type="email" class="form-control @error('email') is-invalid @enderror radius-30 ps-5" id="email" name="email" placeholder="Masukkan email kamu" value="{{ old('email', auth()->user()->email) }}">
                    </div>
                    @error('email')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="oldpass" class="form-label">Password Lama*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-key"></i></div>
                      <input type="password" class="form-control @error('oldpass') is-invalid @enderror radius-30 ps-5" id="oldpass" name="oldpass" value="{{ old('oldpass') }}">
                    </div>
                    @error('oldpass')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="password" class="form-label">Password Baru*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-key"></i></div>
                      <input type="password" class="form-control @error('password') is-invalid @enderror radius-30 ps-5" id="password" name="password" value="{{ old('password') }}">
                    </div>
                    @error('password')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="repeat" class="form-label">Ulangi Password*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-key"></i></div>
                      <input type="password" class="form-control @error('repeat') is-invalid @enderror radius-30 ps-5" id="repeat" name="repeat" value="{{ old('repeat') }}">
                    </div>
                    @error('repeat')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                
              </div>
              <p class="text-danger">*) Wajib diisi!</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="/">Kembali ke dashboard</a>
                <button type="submit" class="btn btn-primary d-block radius-30 px-5">Ubah Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--end page main-->

@endsection