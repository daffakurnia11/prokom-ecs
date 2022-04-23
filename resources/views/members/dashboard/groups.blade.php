@extends('members.layouts.main')

@section('content')
    
<!--start content-->
<main id="dashboard">
  <div class="container py-3">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        @include('members.layouts.profile_data')
      </div>
      <div class="col-xl-9 col-lg-8">
        <div class="card rounded shadow-sm">
          <div class="card-body">
            <ul class="nav nav-tabs nav-fill mb-4">
              <li class="nav-item">
                <a class="nav-link" href="/">Pengumuman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/berkas">Berkas Pelatihan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/jadwal">Jadwal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/kelompok">Kelompok</a>
              </li>
            </ul>

            <h5>Kelompok {{ auth()->user()->participant->group_number }}</h5>
            <div class="card mb-3">
              <div class="d-flex align-items-center g-0">
                <div class="p-4">
                  <img src="/img/{{ isset(auth()->user()->profile->photo) ? 'photo_profile/' . auth()->user()->profile->photo : 'profile.svg' }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="card-body">
                  <p class="card-text mb-2"><small class="text-muted">Data Mentor</small></p>
                  <h5 class="card-title mb-0">{{ $group->user->name }}</h5>
                  <p class="card-text mb-0"><small>{{ $group->user->student_number }}</small></p>
                  <p class="card-text mb-0 d-flex align-items-center">
                    <i class="fs-5 d-block me-2 bi bi-envelope"></i>
                    <span>{{ $group->user->email }}</span>
                  </p>
                  <p class="card-text mb-0 d-flex align-items-center">
                    <i class="fs-5 d-block me-2 bi bi-line"></i>
                    <span>{{ isset($group->user->profile->line_id) ? $group->user->profile->line_id : '-' }}</span>
                  </p>
                  <p class="card-text mb-0 d-flex align-items-center">
                    <i class="fs-5 d-block me-2 bi bi-whatsapp"></i>
                    <span>{{ isset($group->user->profile->whatsapp) ? $group->user->profile->whatsapp : '-' }}</span>
                  </p>
                </div>
              </div>
            </div>
            <h6 class="fw-normal">Anggota Kelompok </h6>
            <ul class="list-group">
              @foreach ($participants as $participant)
              <li class="list-group-item">
                <strong class="d-block">{{ $participant->user->name }}</strong>
                {{ $participant->user->student_number }}
              </li>
              @endforeach
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--end page main-->

@endsection