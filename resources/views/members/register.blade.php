@extends('members.layouts.main')

@section('content')
    
<!--start content-->
<main class="authentication-content">
  <div class="container">
    <div class="my-4">
      <div class="col-xl-8 mx-auto">
        <div class="card p-4 p-sm-5 rounded-0 overflow-hidden shadow-none bg-white border">
          <form action="/register" method="POST" class="form-body" enctype="multipart/form-data">
            @csrf
            <div class="row g-0">
              <div class="col-12">
                <div class="card-body p-0">
                  <h5 class="card-title">Register Akun</h5>
                  <p class="card-text mb-4">Silakan registrasi akun dahulu untuk mendapatkan akses ke dalam dashboard</p>
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                          <input type="text" class="form-control @error('name') is-invalid @enderror radius-30 ps-5" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
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
                    </div>

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="password" class="form-label">Password*</label>
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
                    </div>

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="repeat" class="form-label">Ulangi Password*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                          <input type="password" class="form-control @error('repeat') is-invalid @enderror radius-30 ps-5" id="repeat" name="repeat" placeholder="Ulangi password">
                        </div>
                        @error('repeat')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                  </div>
                  
                  <h5 class="card-title mt-4">Pendaftaran Pelatihan</h5>
                  <p class="card-text mb-4">Silakan isi data diri dahulu untuk kelengkapan pendaftaran</p>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="student_number" class="form-label">NRP*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-bounding-box"></i></div>
                          <input type="text" class="form-control @error('student_number') is-invalid @enderror radius-30 ps-5" id="student_number" name="student_number" placeholder="Masukkan NRP kamu" value="{{ old('student_number') }}">
                        </div>
                        @error('student_number')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="batch" class="form-label">Angkatan*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-badge"></i></div>
                          <input type="text" class="form-control @error('batch') is-invalid @enderror radius-30 ps-5" id="batch" name="batch" placeholder="Masukkan angkatan kamu" value="{{ old('batch') }}">
                        </div>
                        @error('batch')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="classes" class="form-label">Kelas Prokom*</label>
                        <div class="ms-auto position-relative">
                          <select class="form-control @error('classes') is-invalid @enderror radius-30" id="classes" name="classes">
                            <option value="" disabled selected>--PILIH KELAS--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                          </select>
                        </div>
                        @error('classes')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
    
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="krsm" class="form-label">KRSM*</label>
                        <div class="ms-auto position-relative">
                          <input type="file" class="form-control @error('krsm') is-invalid @enderror radius-30" id="krsm" name="krsm" accept=".pdf">
                        </div>
                        @error('krsm')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="payment" class="form-label">Bukti Bayar*</label>
                        <div class="ms-auto position-relative">
                          <input type="file" class="form-control @error('payment') is-invalid @enderror radius-30" id="payment" name="payment" accept=".jpg,.jpeg,.png">
                        </div>
                        @error('payment')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="screenshot" class="form-label">Bukti Follow Instagram ECS*</label>
                        <div class="ms-auto position-relative">
                          <input type="file" class="form-control @error('screenshot') is-invalid @enderror radius-30" id="screenshot" name="screenshot" accept=".jpg,.jpeg,.png">
                        </div>
                        @error('screenshot')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <p class="text-danger">*) Wajib diisi!</p>

                  <div class="mb-3">
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary radius-30 px-5">Register</button>
                    </div>
                  </div>
                  <div class="mb-3 text-center">
                    <p class="mb-0">Sudah punya akun? <a href="/login">Login disini</a></p>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
 </main>
<!--end page main-->

@endsection