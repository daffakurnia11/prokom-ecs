@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Detail Pendaftar</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/admin/pendaftar"><i class="bi bi-people-fill"></i> Pendaftar</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Pendaftar : {{ $user->name }}</h6>
  <hr>
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          {{-- Data Akun --}}
          <div class="card shadow-none border mb-3">
            <div class="card-header">
              <h6 class="mb-0">Data Akun</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Nama</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->name }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Email address</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->email }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Terdaftar pada</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->created_at }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Status</label>
                  @if ($user->verified)
                  <input type="text" class="form-control-plaintext py-0" readonly value="Sudah Diverifikasi">
                  @else
                  <input type="text" class="form-control-plaintext py-0" readonly value="Belum Diverifikasi">
                  @endif
                </div>
              </div>
            </div>
          </div>

          {{-- Data Pribadi --}}
          <div class="card shadow-none border mb-3">
            <div class="card-header">
              <h6 class="mb-0">Data Pribadi</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Nama</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->name }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">NRP</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->student_number }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Kelas</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="Prokom {{ $user->participant->classes }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Universitas</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->profile->university }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Jurusan</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->profile->major }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Angkatan</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->batch }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">ID Line</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->profile->line_id ?? 'Belum terisi' }}">
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label fw-bold">Whatsapp</label>
                  <input type="text" class="form-control-plaintext py-0" readonly value="{{ $user->profile->whatsapp ?? 'Belum terisi' }}">
                </div>
              </div>
            </div>
          </div>

          {{-- Data Berkas --}}
          <div class="card shadow-none border mb-3">
            <div class="card-header">
              <h6 class="mb-0">Data Berkas</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 col-xxl-4 mb-3">
                  <label class="form-label fw-bold">KRSM</label>
                  <a href="/files/krsm/{{ $user->participant->krsm }}" class="d-block">{{ $user->participant->krsm }}</a>
                </div>
                <div class="col-sm-6 col-xxl-4 mb-3">
                  <label class="form-label fw-bold">Bukti Bayar</label>
                  <a href="/files/payment/{{ $user->participant->payment }}" class="d-block">{{ $user->participant->payment }}</a>
                </div>
                <div class="col-sm-6 col-xxl-4 mb-3">
                  <label class="form-label fw-bold">Bukti Follow</label>
                  <a href="/files/screenshot/{{ $user->participant->screenshot }}" class="d-block">{{ $user->participant->screenshot }}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-body">
            <div class="profile-avatar text-center">
              <img src="/img/profile.svg" class="rounded-circle shadow" width="120" height="120" alt="">
            </div>
            <div class="text-center mt-4">
              <h4 class="mb-1">{{ $user->name }}</h4>
              <p class="mb-0 text-secondary">{{ $user->student_number }}</p>
              <div class="mt-4"></div>
              <h6 class="mb-1">{{ $user->profile->major }} {{ $user->batch }}</h6>
              <p class="mb-0 text-secondary">{{ $user->profile->university }}</p>
            </div>
            {{-- <hr>
            <div class="text-start">
              <h5 class="">About</h5>
              <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.
            </div> --}}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
            Status
            @if ($user->verified)
            <span class="badge bg-success rounded-pill">Terverifikasi</span>
            @else
            <span class="badge bg-warning rounded-pill">Perlu Verifikasi</span>
            @endif
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
            Terdaftar
            <span class="badge bg-primary rounded-pill">{{ $user->created_at->diffForHumans() }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div><!--end row-->

  
@endsection