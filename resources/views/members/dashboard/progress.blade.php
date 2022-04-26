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
        <div class="card rounded shadow-sm py-4 px-5">
          <h5 class="card-title mt-3">My Progress</h5>
          <p class="card-text mb-0">Cek selalu progress pelatihan kamu sampai pelatihan berakhir!</p>
          <hr>

          <h6>Total Kehadiran Pelatihan</h6>
          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ $progress }}%</div>
          </div>

          @if ($schedules->isEmpty())
            <p class="text-center">Belum ada jadwal</p>

          @else
            @foreach ($schedules as $schedule)
            @php
                $attend = TRUE
            @endphp
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title mb-4">{{ $schedule->activity }}</h5>
                <p class="card-text mb-1">
                  <i class="bi bi-geo-alt"></i> <strong>Tempat</strong> : {{ $schedule->place }}
                </p>
                <p class="card-text mb-1">
                  <i class="bi bi-calendar3"></i> <strong>Hari, tanggal</strong> : {{ 
                    \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('l') . ' - ' . \Carbon\Carbon::createFromFormat('Y-m-d', $schedule->date)->format('M d, Y') 
                    }}
                </p>
                <p class="card-text mb-1">
                  <i class="bi bi-alarm"></i> <strong>Waktu</strong> : {{ $schedule->time_start }} - {{ $schedule->time_ended }}
                </p>
                @foreach ($presences as $presence)
                  @if ($presence->schedule_id == $schedule->id)
                    @if ($presence->present_code == 'Permit')
                    <p class="card-text mb-1">
                      <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Izin</div>
                      </div>
                    </p>
                    @else
                    <p class="card-text mb-1">
                      <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Hadir</div>
                      </div>
                    </p>
                    @endif
                  @php
                      $attend = FALSE
                  @endphp
                  @endif

                  @endforeach
                @if ($attend)
                <p class="card-text mb-1">
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Tidak Hadir</div>
                  </div>
                </p>
                @endif
              </div>
            </div>
            @endforeach
          @endif

        </div>
      </div>
    </div>
  </div>
</main>
<!--end page main-->

@endsection