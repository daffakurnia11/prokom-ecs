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

            @if ($modules->isEmpty())
            <p class="text-center">Belum ada berkas</p>

            @else
              @foreach ($modules as $module)
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{ $module->module }}</h5>
                  <p class="card-text mb-1">{{ $module->description }}</p>
                  <a href="/files/module/{{ $module->filename }}" class="d-block mb-3">Unduh berkas!</a>
                  <p class="card-text mb-0"><small class="text-muted">Dibuat oleh <strong>{{ $module->user->name }}</strong></small></p>
                  <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($module->published_at)->diffForHumans() }}</small></p>
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