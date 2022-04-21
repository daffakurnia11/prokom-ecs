@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Jadwal Pelatihan</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Daftar Jadwal Pelatihan Prokom 2022</h6>
  <hr>
  <div class="card">
    <div class="card-header">
      <a href="/admin/jadwal/create" class="btn btn-primary">Buat Jadwal Baru</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Kegiatan</th>
              <th>Hari, Tanggal</th>
              <th>Waktu</th>
              <th>Tempat</th>
              <th>Kode Presensi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($schedules as $schedule)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-wrap">{{ $schedule->activity }}</td>
                <td class="text-wrap">
                  {{ 
                    \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('l') . ', ' .$schedule->date 
                    }}
                </td>
                <td class="text-nowrap">{{ $schedule->time_start . ' - ' . $schedule->time_ended }}</td>
                <td class="text-nowrap">{{ $schedule->place }}</td>
                <td class="text-center text-nowrap">{{ $schedule->present_code }}</td>
                <td class="text-center">
                  <a href="/admin/jadwal/{{ $schedule->id }}/edit" class="text-success"><i class="bi bi-pencil-square"></i> Edit</a>
                  <a href="/admin/jadwal/{{ $schedule->id }}/regenerate" class="text-primary"><i class="bi bi-upc-scan"></i> Ubah Kode</a>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Nama Kegiatan</th>
              <th>Hari, Tanggal</th>
              <th>Waktu</th>
              <th>Tempat</th>
              <th>Kode Presensi</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div> 

  
@endsection