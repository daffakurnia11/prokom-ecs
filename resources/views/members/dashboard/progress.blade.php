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
          <h6>Progress Pelatihan</h6>
          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ $progress }}%</div>
          </div>
        </div>
        <div class="card rounded shadow-sm py-4 px-5">
          <h5 class="card-title mt-3">My Attendance</h5>
          <hr>
          <div class="card mb-3">
            <div class="card-body">
              @if ($schedules->isEmpty())
                <p class="text-center">Belum ada jadwal</p>
              @else   
                @foreach ($schedules as $schedule)
                @php
                  $attend = TRUE
                @endphp
                <div class="row mb-3">
                  <div class="col-lg-3 d-flex justify-content-center flex-column">
                    <div class="progress">
                      @foreach ($presences as $presence)
                        {{-- <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Tidak Hadir</div> --}}
                        @if ($presence->schedule_id == $schedule->id)
                          @if ($presence->present_code == 'Permit')
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Izin</div>
                          @else
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Hadir</div>
                          @endif
                          @php
                              $attend = FALSE
                          @endphp
                        @endif
                      @endforeach
                      @if ($attend)
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Tidak Hadir</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <p class="card-text">
                      {{ $schedule->activity }}
                    </p>
                  </div>
                </div>
                @endforeach
              @endif
            </div>
          </div>
          <h5 class="card-title mt-3">My Submission</h5>
          <hr>
          <div class="card mb-3">
            <div class="card-body">
              @if ($submissions->isEmpty())
                <p class="text-center">Belum ada pengumpulan penugasan</p>
              @else   
                @foreach ($submissions as $submission)
                <div class="row mb-3">
                  <div class="col-lg-3 d-flex justify-content-center flex-column">
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Tidak Hadir</div>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <p class="card-text">
                      {{ $submission->module }} - {{ $submission->file }}
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
  </div>
</main>
<!--end page main-->

@endsection