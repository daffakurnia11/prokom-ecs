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
          <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Pengumuman Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card">
      <div class="card-header">
        <a href="/admin/pengumuman/create" class="btn btn-primary">Buat Pengumuman Baru</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Pembuat</th>
                <th>Diumumkan pada</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($announcements as $announcement)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-wrap">{{ $announcement->title }}</td>
                  <td class="text-wrap">{{ $announcement->description }}</td>
                  <td class="text-nowrap">{{ $announcement->user->name }}</td>
                  <td class="text-center text-nowrap">{{ $announcement->published_at ?? 'Belum diumumkan' }}</td>
                  <td class="text-center">
                    <a href="/admin/pengumuman/{{ $announcement->id }}/edit" class="text-success"><i class="bi bi-pencil-square"></i> Edit</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Pembuat</th>
                <th>Diumumkan pada</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> 

  
@endsection