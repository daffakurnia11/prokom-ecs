@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Data Kelompok</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kelompok</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Kelompok Pelatihan Prokom 2022</h6>
  <hr>
  <div class="accordion row">
    @foreach ($groups as $group)
    <div class="col-lg-6">
      <div class="accordion-item mb-2">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $group->id }}">
            Kelompok {{ $group->group_number }}
          </button>
        </h2>
        <div id="collapse{{ $group->id }}" class="collapse show">
          <div class="accordion-body">
            <p class="mb-1"><strong>Asisten : </strong>{{ $group->user->name }}</p>
            <ul class="list-group list-group-flush">
              @foreach ($participants as $participant)
              @if ($participant->group_number == $group->group_number)
              <li class="list-group-item">
                <a href="/admin/pendaftar/{{ $participant->user->student_number }}">
                  {{ $participant->user->name }}
                </a>
              </li>
              @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  
@endsection