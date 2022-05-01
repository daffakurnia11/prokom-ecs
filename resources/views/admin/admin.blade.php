@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Data Admin</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Admin Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>User ID</th>
                <th>Nama Admin</th>
                <th>NRP</th>
                <th>Angkatan</th>
                <th>Email</th>
                <th>Line ID</th>
                <th>Whatsapp</th>
                <th>Kelompok</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($admins as $user)
              <tr>
                <td class="text-center text-nowrap">{{ $loop->iteration }}</td>
                <td class="text-center text-nowrap">{{ $user->id }}</td>
                <td class="text-nowrap">{{ $user->name }}</td>
                <td class="text-center text-nowrap">{{ $user->student_number }}</td>
                <td class="text-center text-nowrap">{{ $user->batch }}</td>
                <td class="text-nowrap">{{ $user->email }}</td>
                <td class="text-center">{{ $user->profile->line_id }}</td>
                <td class="text-center text-nowrap">{{ $user->profile->whatsapp }}</td>
                <td class="text-center text-nowrap">{{ $user->group->group_number ?? 'No group' }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>User ID</th>
                <th>Nama Admin</th>
                <th>NRP</th>
                <th>Angkatan</th>
                <th>Email</th>
                <th>Line ID</th>
                <th>Whatsapp</th>
                <th>Kelompok</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> 

  
@endsection