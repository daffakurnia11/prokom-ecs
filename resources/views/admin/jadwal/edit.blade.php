@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Jadwal</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/admin/jadwal"><i class="bi bi-calendar-week"></i> Jadwal</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ubah Jadwal</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Form Pengubahan Jadwal Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card col-lg-9 col-xxl-6">
      <form action="/admin/jadwal/{{ $schedule->id }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="activity" class="form-label">Nama Kegiatan</label>
            <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity" value="{{ old('activity', $schedule->activity) }}">
            @error('activity')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Tanggal Kegiatan</label>
                <input class="result form-control @error('date') is-invalid @enderror" value="{{ old('date', $schedule->date) }}" type="text" name="date" id="dateStart">
                @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Waktu Mulai</label>
                <input class="result form-control @error('time_start') is-invalid @enderror" value="{{ old('time_start', $schedule->time_start) }}" type="text" name="time_start" id="timeStart">
                @error('time_start')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Waktu Selesai</label>
                <input class="result form-control @error('time_ended') is-invalid @enderror" value="{{ old('time_ended', $schedule->time_ended) }}" type="text" name="time_ended" id="timeEnded">
                @error('time_ended')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="place" class="form-label">Tempat</label>
            <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{ old('place', $schedule->place) }}">
            @error('place')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Ubah Jadwal!</button>
        </div>
      </form>
    </div> 

  
@endsection