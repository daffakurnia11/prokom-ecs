@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Penugasan {{ $module }}</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Penugasan</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Pengumpulan Penugasan {{ $module }} Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NRP</th>
                <th>Kelompok</th>
                <th>File Penugasan</th>
                <th>Link Video Youtube</th>
                <th>Catatan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($submission as $submission)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-nowrap">{{ $submission->user->name }}</td>
                  <td class="text-center text-nowrap">{{ $submission->user->student_number }}</td>
                  <td class="text-center">{{ $submission->user->participant->group_number }}</td>
                  <td class="text-nowrap">
                    <a href="/files/submission/{{ $submission->file }}">{{ $submission->file }}</a>
                  </td>
                  <td class="text-wrap"><a href="{{ $submission->video }}" target="_blank">{{ $submission->video }}</a></td>
                  <td class="text-wrap">{{ $submission->notes }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NRP</th>
                <th>Kelompok</th>
                <th>File Penugasan</th>
                <th>Link Video Youtube</th>
                <th>Catatan</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> 

  
@endsection