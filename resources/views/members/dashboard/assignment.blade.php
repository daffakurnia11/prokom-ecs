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
        <div class="card rounded shadow-sm">
          <div class="card-body">
            
            @include('members.layouts.navigation')

            <div class="card rounded shadow-sm py-3 px-4">
            <h5 class="card-title">Form Pengumpulan Penugasan</h5>
            <p class="card-text mb-0">Lengkapi form dibawah ini dan upload penugasan kamu!</p>
            <hr>

            @if(session()->has('message') && session('message') == 'Submitted')
            <div class="alert alert-success alert-dismissible fade show radius-30 ps-4" role="alert">
              Penugasan berhasil diupload!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
    
            
            <div class="alert border-0 border-warning border-start border-4 bg-light-warning  fade show py-2">
              <div class="d-flex align-items-center">
                <div class="fs-3 text-warning"><i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="ms-3">
                  <div class="text-warning">
                    <strong>DEADLINE!</strong>
                    Final Project : Sabtu, 28 Mei 2022 Pukul 10.00 WTF
                  </div>
                </div>
              </div>
            </div>

            @if ($submission)
              <div>
                <p class="card-text">Selamat! Kamu sudah menyelesaikan penugasan yang sudah diberikan.</p>
                <div class="mb-1 row">
                  <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $submission->user->name }}">
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="student_number" class="col-sm-2 col-form-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="student_number" value="{{ $submission->user->student_number }}">
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="group_number" class="col-sm-2 col-form-label">Kelompok</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="group_number" value="{{ $submission->user->participant->group_number }}">
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="module" class="col-sm-2 col-form-label">Modul</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="module" value="{{ $submission->module == 'FP' ? 'Final Project' : '' }}">
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="file" class="col-sm-2 col-form-label">Berkas</label>
                  <div class="col-sm-10">
                    <a href="files/submission/{{ $submission->file }}" class="py-2 d-block">{{ $submission->file }}</a>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="file" class="col-sm-2 col-form-label">Catatan</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="module" value="{{ $submission->notes }}">
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="file" class="col-sm-2 col-form-label">Terkumpul pada</label>
                  <div class="col-sm-10">
                    <p class="form-control-plaintext">
                      {{ $submission->created_at }} <em>({{ $submitted }})</em>
                    </p>
                  </div>
                </div>
              </div>
            @else
              <div class="card-body px-0 pt-0">
                <form action="/penugasan" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <h5 class="fs-6 mt-3">Data Diri</h5>
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                          <input type="text" readonly class="form-control @error('name') is-invalid @enderror radius-30 ps-5" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name', auth()->user()->name) }}">
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
                        <label for="student_number" class="form-label">NRP*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                          <input type="text" readonly class="form-control @error('student_number') is-invalid @enderror radius-30 ps-5" id="student_number" name="student_number" placeholder="Masukkan nama lengkap" value="{{ old('student_number', auth()->user()->student_number) }}">
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
                        <label for="group_number" class="form-label">Kelompok*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                          <input type="text" readonly class="form-control @error('group_number') is-invalid @enderror radius-30 ps-5" id="group_number" name="group_number" placeholder="Masukkan nama lengkap" value="{{ old('group_number', auth()->user()->participant->group_number) }}">
                        </div>
                        @error('group_number')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="module" class="form-label">Materi*</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                          <input type="text" readonly class="form-control @error('module') is-invalid @enderror radius-30 ps-5" id="module" name="module" placeholder="Masukkan nama lengkap" value="{{ old('module', "Final Project") }}">
                        </div>
                        @error('module')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <h5 class="fs-6 mt-3">Data Penugasan</h5>
                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label for="file" class="form-label">File Penugasan (format .zip)*</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror radius-30" id="file" name="file" value="{{ old('file') }}">
                        @error('file')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label for="notes" class="form-label">Catatan Reviewer</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{ old('notes') }}"></textarea>
                        @error('notes')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <p class="text-danger">*) Wajib diisi!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary d-block radius-30 px-5">Upload Penugasan</button>
                  </div>
                </form>
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--end page main-->

@endsection
