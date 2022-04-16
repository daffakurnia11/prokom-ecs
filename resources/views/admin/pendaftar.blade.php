@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Data Pendaftar</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pendaftar</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Pendaftar Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Pendaftar</th>
                <th>NRP</th>
                <th>Kelas</th>
                <th>Terdaftar</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td class="text-center text-nowrap">{{ $loop->iteration }}</td>
                <td class="text-nowrap">{{ $user->name }}</td>
                <td class="text-center text-nowrap">{{ $user->student_number }}</td>
                <td class="text-center">Prokom {{ $user->participant->classes }}</td>
                <td class="text-center text-nowrap">{{ $user->created_at }}</td>
                <td class="text-center">
                  @if ($user->verified)
                  <em class="text-success">Sudah Diverifikasi</em>
                  @else
                  <em class="text-warning">Belum Diverifikasi</em>
                  @endif
                </td>
                <td class="text-center">
                  <a href="/admin/pendaftar/{{ $user->student_number }}" class="text-success">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Pendaftar</th>
                <th>NRP</th>
                <th>Kelas</th>
                <th>Terdaftar</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> 

  
@endsection