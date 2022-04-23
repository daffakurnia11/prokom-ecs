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
          <li class="breadcrumb-item active" aria-current="page">Modul</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Daftar Modul Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card">
      <div class="card-header">
        <a href="/admin/modul/create" class="btn btn-primary">Tambah Modul Baru</a>
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
                <th>File Modul</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($modules as $module)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-nowrap">{{ $module->module }}</td>
                  <td>{{ $module->description }}</td>
                  <td class="text-nowrap">{{ $module->user->name }}</td>
                  <td class="text-nowrap">
                    <a href="/files/module/{{ $module->filename }}" target="_blank">{{ $module->filename }}</a>
                  </td>
                  <td>
                    <form action="/admin/modul/{{ $module->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="/admin/modul/{{ $module->id }}/edit" class="text-success"><i class="bi bi-pencil-square"></i> Edit</a>
                      <button type="submit" class="btn btn-sm p-0 text-danger deleteButton"><i class="bi bi-trash"></i> Hapus</button>
                    </form>
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
                <th>File Modul</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> 

  
@endsection