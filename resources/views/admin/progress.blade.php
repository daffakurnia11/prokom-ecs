@extends('admin.layouts.main')

@section('container')
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Rekap Progress</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Progress</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Rekap Progress Pelatihan Prokom 2022</h6>
    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>user_id</th>
                <th>Nama Pendaftar</th>
                <th>NRP</th>
                <th>Briefing</th>
                <th>P1</th>
                <th>P2</th>
                <th>P3</th>
                <th>Presbar 1</th>
                <th>Presbar 2</th>
                <th>Penugasan P1</th>
                <th>Penugasan P2</th>
                <th>Final Project</th>
                <th>Decision</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                @php
                  $contribution = 0
                @endphp
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">
                    <a href="/admin/pendaftar/{{ $user->student_number }}">{{ $user->id }}</a>
                  </td>
                  <td class="text-nowrap">{{ $user->name }}</td>
                  <td class="text-center text-nowrap">{{ $user->student_number }}</td>
                  <td class="text-center">
                    @php
                      $absent = TRUE
                    @endphp
                    @foreach ($presences as $presence)
                      @if ($user->id == $presence->user_id)
                        @if ($presence->schedule_id == 1)
                          @if ($presence->present_code == "Permit")
                            <span class="text-primary">Izin</span>
                          @else
                            <span class="text-success">Hadir</span>
                          @endif
                          @php
                            $absent = FALSE;
                            $contribution++
                          @endphp
                        @endif
                      @endif
                    @endforeach
                    @if ($absent)
                      <span class="text-danger">Tidak Hadir</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $absent = TRUE
                    @endphp
                    @foreach ($presences as $presence)
                      @if ($user->id == $presence->user_id)
                        @if ($presence->schedule_id == 2)
                          @if ($presence->present_code == "Permit")
                            <span class="text-primary">Izin</span>
                          @else
                            <span class="text-success">Hadir</span>
                          @endif
                          @php
                            $absent = FALSE;
                            $contribution++
                          @endphp
                        @endif
                      @endif
                    @endforeach
                    @if ($absent)
                      <span class="text-danger">Tidak Hadir</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $absent = TRUE
                    @endphp
                    @foreach ($presences as $presence)
                      @if ($user->id == $presence->user_id)
                        @if ($presence->schedule_id == 3)
                          @if ($presence->present_code == "Permit")
                            <span class="text-primary">Izin</span>
                          @else
                            <span class="text-success">Hadir</span>
                          @endif
                          @php
                            $absent = FALSE;
                            $contribution++
                          @endphp
                        @endif
                      @endif
                    @endforeach
                    @if ($absent)
                      <span class="text-danger">Tidak Hadir</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $absent = TRUE
                    @endphp
                    @foreach ($presences as $presence)
                      @if ($user->id == $presence->user_id)
                        @if ($presence->schedule_id == 4)
                          @if ($presence->present_code == "Permit")
                            <span class="text-primary">Izin</span>
                          @else
                            <span class="text-success">Hadir</span>
                          @endif
                          @php
                            $absent = FALSE;
                            $contribution++
                          @endphp
                        @endif
                      @endif
                    @endforeach
                    @if ($absent)
                      <span class="text-danger">Tidak Hadir</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $absent = TRUE
                    @endphp
                    @foreach ($presences as $presence)
                      @if ($user->id == $presence->user_id)
                        @if ($presence->schedule_id == 5)
                          @if ($presence->present_code == "Permit")
                            <span class="text-primary">Izin</span>
                          @else
                            <span class="text-success">Hadir</span>
                          @endif
                          @php
                            $absent = FALSE;
                            $contribution++
                          @endphp
                        @endif
                      @endif
                    @endforeach
                    @if ($absent)
                      <span class="text-danger">Tidak Hadir</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $absent = TRUE
                    @endphp
                    @foreach ($presences as $presence)
                      @if ($user->id == $presence->user_id)
                        @if ($presence->schedule_id == 6)
                          @if ($presence->present_code == "Permit")
                            <span class="text-primary">Izin</span>
                          @else
                            <span class="text-success">Hadir</span>
                          @endif
                          @php
                            $absent = FALSE;
                            $contribution++
                          @endphp
                        @endif
                      @endif
                    @endforeach
                    @if ($absent)
                      <span class="text-danger">Tidak Hadir</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $submitted = FALSE
                    @endphp
                    @foreach ($submissions as $submission)
                      @if ($user->id == $submission->user_id && $submission->module === "P1")
                        <a href="/files/submission/{{ $submission->file }}" class="text-success">Submitted</a>
                        @php
                          $submitted = TRUE;
                          $contribution++
                        @endphp
                      @endif
                    @endforeach
                    @if (!$submitted)
                      <span class="text-danger">Tidak ada</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $submitted = FALSE
                    @endphp
                    @foreach ($submissions as $submission)
                      @if ($user->id == $submission->user_id && $submission->module === "P2")
                        <a href="/files/submission/{{ $submission->file }}" class="text-success">Submitted</a>
                        @php
                          $submitted = TRUE;
                          $contribution++
                        @endphp
                      @endif
                    @endforeach
                    @if (!$submitted)
                      <span class="text-danger">Tidak ada</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $submitted = FALSE
                    @endphp
                    @foreach ($submissions as $submission)
                      @if ($user->id == $submission->user_id && $submission->module === "FP")
                        <a href="/files/submission/{{ $submission->file }}" class="text-success">Submitted</a>
                        @php
                          $submitted = TRUE;
                          $contribution++
                        @endphp
                      @endif
                    @endforeach
                    @if (!$submitted)
                      <span class="text-danger">Tidak ada</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @php
                      $decision = ($contribution / 9) * 100
                    @endphp
                    @if ($decision > 75)
                      <span class="text-success">Lulus ({{ intval($decision) }}%)</span>
                    @elseif ($decision >= 55 && $decision < 75)
                      <span class="text-warning">Dipertimbangkan ({{ intval($decision) }}%)</span>
                    @else
                      <span class="text-danger">Tidak Lulus ({{ intval($decision) }}%)</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>user_id</th>
                <th>Nama Pendaftar</th>
                <th>NRP</th>
                <th>Briefing</th>
                <th>P1</th>
                <th>P2</th>
                <th>P3</th>
                <th>Presbar 1</th>
                <th>Presbar 2</th>
                <th>Penugasan P1</th>
                <th>Penugasan P2</th>
                <th>Final Project</th>
                <th>Decision</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div> 

  
@endsection