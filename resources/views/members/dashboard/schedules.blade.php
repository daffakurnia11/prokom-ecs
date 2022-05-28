@extends('members.layouts.main')

@section('content')
    
@if (session()->has('message'))
  <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
@endif

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
            
            @include('members.layouts.navigation')

            @if ($schedules->isEmpty())
              <p class="text-center">Belum ada jadwal</p>

            @else

            <div class="card">
              <h2 class="card-title" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Jadwal Presentasi Final Project
                </button>
              </h2>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div class="accordion-body">
                  <div class="row">
                    @foreach ($presentations as $presentation)
                    <div class="col-xl-6 col-lg-12 col-sm-6">
                      <div class="list-group-item my-2">
                        <strong class="d-block">Kelompok {{ $presentation->group_number }}</strong>
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
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

              @foreach ($schedules as $schedule)
              @php
                  $button = TRUE
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
                    <button type="button" class="btn px-5 mt-3 btn-sm btn-outline-warning disabled">Izin</button>
                    @else
                    <button type="button" class="btn px-5 mt-3 btn-sm btn-outline-primary disabled">Telah Hadir</button>
                    @endif
                    @php
                        $button = FALSE
                    @endphp
                    @endif

                    @endforeach
                  @if ($button)
                  <button type="button" class="attendanceButton btn px-5 mt-3 btn-sm btn-primary" data-bs-toggle="modal" data-presence-id="{{ $schedule->id }}" data-bs-target="#attendanceModal">Hadir</button>
                  @endif
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

<!-- Modal -->
<div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="attendanceModalLabel">Form Isi Kehadiran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/onPresence" method="post" id="attendanceForm">
        @csrf
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="present_code" id="present_code" placeholder="name@example.com">
            <label for="present_code">Kode Presensi</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Hadiri!</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection