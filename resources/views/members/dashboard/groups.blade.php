@extends('members.layouts.main')

@section('content')
    
<!--start content-->
<main id="dashboard">
  <div class="container mb-5 py-3">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        @include('members.layouts.profile_data')
      </div>
      <div class="col-xl-9 col-lg-8">
        <div class="card rounded shadow-sm">
          <div class="card-body">

            @if ($number)
            <h5>Kelompok {{ $number }}</h5>
            <div class="card mb-3">
              <div class="d-flex align-items-center flex-column flex-sm-row g-0">
                <div class="ratio ratio-1x1 m-3" style="max-width: 150px">
                  <img src="/img/{{ isset(auth()->user()->profile->profile_pict) ? 'photo_profile/' . auth()->user()->profile->profile_pict : 'profile.svg' }}" class="img-thumbnail rounded-circle d-block mx-auto">
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
            
            <h6 class="fw-normal mt-3">Jadwal Presentasi Final Project</h6>
            <div class="card mb-3">
              <div class="card-body">
                <p class="card-text mb-1">
                  <i class="bi bi-calendar3"></i> <strong>Hari, tanggal</strong> : {{ 
                    \Carbon\Carbon::createFromFormat('Y-m-d', $presentation->date)->format('l') . ' - ' . \Carbon\Carbon::createFromFormat('Y-m-d', $presentation->date)->format('M d, Y') 
                    }}
                </p>
                <p class="card-text mb-1">
                  <i class="bi bi-alarm"></i> <strong>Waktu</strong> : {{ $presentation->time_start }} - {{ $presentation->time_ended }}
                </p>
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

            @else
            <h5 class="text-center">Tidak ada kelompok</h5>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--end page main-->

@endsection