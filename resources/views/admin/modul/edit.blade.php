@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Modul</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/admin/modul"><i class="bi bi-journal-text"></i> Modul</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Modul</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Form Penambahan Modul Pelatihan Prokom 2022</h6>
  <hr>
  <div class="card col-lg-9 col-xl-6">
    <form action="/admin/modul/{{ $module->id }}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="mb-3">
          <label for="module" class="form-label">Judul Modul</label>
          <input type="text" class="form-control @error('module') is-invalid @enderror" id="module" name="module" value="{{ old('module', $module->module) }}">
          @error('module')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi Modul</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $module->description) }}</textarea>
          @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="filename" class="form-label">Upload File Modul</label>
          <input class="form-control" type="file" name="filename" id="filename" accept=".pdf">
          @error('filename')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Tambah Modul!</button>
      </div>
    </form>
  </div> 

  
@endsection