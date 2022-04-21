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
                <a class="nav-link active" href="/jadwal">Jadwal</a>
              </li>
            </ul>

            @if ($schedules->isEmpty())
              <p class="text-center">Belum ada jadwal</p>

            @else
              @foreach ($schedules as $schedule)
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title mb-4">{{ $schedule->activity }}</h5>
                  <p class="card-text mb-1">
                    <i class="bi bi-geo-alt"></i> <strong>Tempat</strong> : {{ $schedule->place }}
                  </p>
                  <p class="card-text mb-1">
                    <i class="bi bi-calendar3"></i> <strong>Hari, tanggal</strong> : {{ $schedule->date }}
                  </p>
                  <p class="card-text mb-1">
                    <i class="bi bi-alarm"></i> <strong>Waktu</strong> : {{ $schedule->time_start }} - {{ $schedule->time_ended }}
                  </p>
                </div>
              </div>
              @endforeach
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!--end page main-->

@endsection