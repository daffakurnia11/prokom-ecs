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
            
            @include('members.layouts.navigation')

            <div class="alert border-0 bg-light-info alert-dismissible fade show py-2">
              <div class="d-flex align-items-center">
                <div class="fs-3 text-info"><i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="ms-3">
                  <div class="text-info">
                    <strong>NEW FEATURES!</strong>
                    Update Admin's Participants Group and Progress. Check your group!
                  </div>
                </div>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

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