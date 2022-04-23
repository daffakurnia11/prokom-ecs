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
                <a class="nav-link active" href="/">Pengumuman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/berkas">Berkas Pelatihan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/jadwal">Jadwal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/kelompok">Kelompok</a>
              </li>
            </ul>

            @if ($announcements->isEmpty())
              <p class="text-center">Belum ada pengumuman</p>

            @else
              @foreach ($announcements as $announcement)
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{ $announcement->title }}</h5>
                  <p class="card-text">{{ $announcement->description }}</p>
                  <p class="card-text mb-0"><small class="text-muted">Dibuat oleh <strong>{{ $announcement->user->name }}</strong></small></p>
                  <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($announcement->published_at)->diffForHumans() }}</small></p>
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