@extends('members.layouts.main')

@section('content')
    
<!--start content-->
<main id="dashboard" class="mb-5">
  <div class="container py-3">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        @include('members.layouts.profile_data')
      </div>
      <div class="col-xl-9 col-lg-8">
        <div class="card rounded shadow-sm py-4 px-5">
          <h5 class="card-title mt-3">Edit Profil</h5>
          <p class="card-text mb-0">Lengkapi dan isi data diri kamu melalui form dibawah!</p>
          <hr>

          @if(session()->has('message') && session('message') == 'Profile updated')
          <div class="alert alert-success alert-dismissible fade show radius-30 ps-4" role="alert">
            Profil berhasil diubah!
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
            <form action="/profil/{{ auth()->user()->student_number }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <h5 class="fs-6 mt-3">Pengaturan Akun</h5>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                      <input type="text" class="form-control @error('name') is-invalid @enderror radius-30 ps-5" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name', auth()->user()->name) }}">
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
                      <input type="email" class="form-control @error('email') is-invalid @enderror radius-30 ps-5" id="email" name="email" placeholder="Masukkan email kamu" value="{{ old('email', auth()->user()->email) }}">
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
                    <label for="photo" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror radius-30" id="photo" name="photo" accept=".png,.jpg,.jpeg">
                    @error('photo')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                
                <h5 class="fs-6 mt-3">Data Pribadi</h5>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="university" class="form-label">Universitas*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-building"></i></div>
                      <input type="text" readonly class="form-control @error('university') is-invalid @enderror radius-30 ps-5" id="university" name="university" placeholder="Masukkan Universitas kamu" value="{{ old('university', auth()->user()->profile->university ?? '') }}">
                    </div>
                    @error('university')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="major" class="form-label">Jurusan*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-book"></i></div>
                      <input type="text" readonly class="form-control @error('major') is-invalid @enderror radius-30 ps-5" id="major" name="major" placeholder="Masukkan Jurusan kamu" value="{{ old('major', auth()->user()->profile->major ?? '') }}">
                    </div>
                    @error('major')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="student_number" class="form-label">NRP*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-bounding-box"></i></div>
                      <input type="text" class="form-control @error('student_number') is-invalid @enderror radius-30 ps-5" id="student_number" name="student_number" placeholder="Masukkan NRP kamu" value="{{ old('student_number', auth()->user()->student_number ?? '') }}">
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
                      <input type="text" class="form-control @error('batch') is-invalid @enderror radius-30 ps-5" id="batch" name="batch" placeholder="Masukkan angkatan kamu" value="{{ old('batch', auth()->user()->batch ?? '') }}">
                    </div>
                    @error('batch')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>
                
                <h5 class="fs-6 mt-3">Kontak Pribadi</h5>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="line_id" class="form-label">Line ID</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-badge"></i></div>
                      <input type="text" class="form-control @error('line_id') is-invalid @enderror radius-30 ps-5" id="line_id" name="line_id" placeholder="Masukkan ID Line kamu" value="{{ old('line_id', auth()->user()->profile->line_id ?? '') }}">
                    </div>
                    @error('line_id')
                    <small class="text-danger">
                      {{ $message }}
                    </small>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="whatsapp" class="form-label">Whatsapp*</label>
                    <div class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-badge"></i></div>
                      <input type="text" class="form-control @error('whatsapp') is-invalid @enderror radius-30 ps-5" id="whatsapp" name="whatsapp" placeholder="Masukkan No Whatsapp kamu" value="{{ old('whatsapp', auth()->user()->profile->whatsapp ?? '') }}">
                    </div>
                    @error('whatsapp')
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
                <button type="submit" class="btn btn-primary d-block radius-30 px-5">Update Profil</button>
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