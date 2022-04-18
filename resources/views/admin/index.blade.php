@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Hallo, {{ auth()->user()->name }}</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 row-cols-xxl-6">
    <div class="col">
      <div class="card radius-10">
        <div class="card-body text-center">
          <div class="widget-icon mx-auto mb-3 bg-light-primary text-primary">
            <i class="bi bi-person-plus-fill"></i>
          </div>
          <p class="mb-0">Pendaftar</p>
          <h3 class="mt-4 mb-0">{{ $participants }}</h3>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10">
        <div class="card-body text-center">
          <div class="widget-icon mx-auto mb-3 bg-light-primary text-danger">
            <i class="bi bi-person-x-fill"></i>
          </div>
          <p class="mb-0">Perlu Verifikasi</p>
          <h3 class="mt-4 mb-0">{{ $unverified }}</h3>
        </div>
      </div>
    </div>
  </div>
  
@endsection