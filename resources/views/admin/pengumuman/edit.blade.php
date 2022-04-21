@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Pengumuman</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/admin/pengumuman"><i class="bi bi-megaphone"></i> Pengumuman</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ubah Pengumuman</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Form Pengubahan Pengumuman Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card col-lg-9 col-xl-6">
      <form action="/admin/pengumuman/{{ $announcement->id }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="title" class="form-label">Judul Pengumuman</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $announcement->title) }}">
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Pengumuman</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $announcement->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="publish" name="publish" {{ $announcement->published_at ? 'checked' : '' }}>
            <label class="form-check-label" for="publish">
              Umumkan!
            </label>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Ubah Pengumuman Baru!</button>
        </div>
      </form>
    </div> 

  
@endsection