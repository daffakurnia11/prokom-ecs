@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Data Kehadiran {{ $module }}</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kehadiran</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Kehadiran {{ $module }} Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card col-lg-9">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Pendaftar</th>
                <th>NRP</th>
                <th>Kegiatan</th>
                <th>Hadir pada</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td class="text-center text-nowrap">{{ $loop->iteration }}</td>
                <td class="text-nowrap">{{ $user->name }}</td>
                <td class="text-center text-nowrap">{{ $user->student_number }}</td>
                @if ($user->presence)
                  @php
                    $attend = FALSE
                  @endphp
                  @foreach ($user->presence as $presence)
                    @if ($presence->schedule_id == $schedule)
                      @php
                        $attend = TRUE
                      @endphp
                      <td class="text-nowrap text-center">
                        @if ($presence->present_code == 'Permit')
                        <span class="text-primary">Izin</span>
                        @else
                        <span class="text-success">Hadir</span>
                        @endif
                      </td>
                      <td class="text-center text-nowrap">{{ $presence->created_at }}</td>
                    @endif
                  @endforeach
                  @if ($attend == FALSE)
                  <td class="text-nowrap text-center">
                    <span class="text-danger">Tidak hadir</span>
                  </td>
                  <td class="text-center">
                    <a class="text-success" href="/admin/kehadiran/setAttend?schedule={{ $schedule }}&user={{ $user->id }}">Hadirkan!</a>
                    <a class="text-primaary" href="/admin/kehadiran/setPermission?schedule={{ $schedule }}&user={{ $user->id }}">Izinkan!</a>
                  </td>
                  @endif
                @endif
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Pendaftar</th>
                <th>NRP</th>
                <th>Kegiatan</th>
                <th>Hadir pada</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> 

  
@endsection