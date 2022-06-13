<div class="card rounded shadow-sm mb-3">
  <div class="card-body">
    <div class="ratio ratio-1x1 mx-auto" style="max-width: 200px">
      <img src="/img/{{ isset(auth()->user()->profile->profile_pict) ? 'photo_profile/' . auth()->user()->profile->profile_pict : 'profile.svg' }}" class="img-thumbnail rounded-circle d-block mx-auto">
    </div>
    <h1 class="fs-4 mt-3 mb-0 text-center">{{ auth()->user()->name }}</h1>

    @if (isset(auth()->user()->student_number))
    <p class="fs-6 text-center my-0">{{ auth()->user()->student_number }}</p>
    @endif
    <a href="/profil" class="fs-6 d-block text-center mt-0">Edit profil</a>
    
    @if (auth()->user()->roles == 'Member')
    <h2 class="fs-5 mt-3 mb-0 text-center">Status</h2>
      @if (auth()->user()->certificate->status == "Lulus")
      <p class="fs-6 fw-bold text-success text-center my-0">{{ auth()->user()->certificate->status }} ({{ auth()->user()->certificate->progress }}%)</p>
      <a href="/certificate" target="_blank" class="d-block text-center">Download Sertifikat</a>
      @elseif (auth()->user()->certificate->status == "Dipertimbangkan")
      <p class="fs-6 fw-bold text-warning text-center my-0">{{ auth()->user()->certificate->status }} ({{ auth()->user()->certificate->progress }}%)</p>
      @else
      <p class="fs-6 fw-bold text-danger text-center my-0">{{ auth()->user()->certificate->status }} ({{ auth()->user()->certificate->progress }}%)</p>
      @endif
    @endif

    @if (auth()->user()->roles == 'Admin')
    <div class="mt-3">
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-envelope"></i>
        <span>{{ auth()->user()->email }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-person-check-fill"></i>
        <span>{{ auth()->user()->roles }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-person-badge"></i>
        <span>{{ isset(auth()->user()->batch) ? 'Angkatan ' . auth()->user()->batch : '-' }}</span>
      </p>
    </div>
    <hr>
    <div class="mt-3">
      <p class="fs-6 mx-2 mb-1 fw-bold">Kontak Pribadi</p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-line"></i>
        <span>{{ isset(auth()->user()->profile->line_id) ? auth()->user()->profile->line_id : '-' }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-whatsapp"></i>
        <span>{{ isset(auth()->user()->profile->whatsapp) ? auth()->user()->profile->whatsapp : '-' }}</span>
      </p>
    </div>
    @else
    <div class="mt-3">
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-envelope"></i>
        <span>{{ auth()->user()->email }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-building"></i>
        <span>{{ isset(auth()->user()->profile->university) ? auth()->user()->profile->university : '-' }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-book"></i>
        <span>{{ isset(auth()->user()->profile->major) ? auth()->user()->profile->major : '-' }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-person-badge"></i>
        <span>{{ isset(auth()->user()->batch) ? 'Angkatan ' . auth()->user()->batch : '-' }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-people-fill"></i>
        <span>{{ isset(auth()->user()->participant->group_number) ? 'Kelompok ' . auth()->user()->participant->group_number : '-' }}</span>
      </p>
    </div>
    <hr>
    <div class="mt-3">
      <p class="fs-6 mx-2 mb-1 fw-bold">Kontak Pribadi</p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-line"></i>
        <span>{{ isset(auth()->user()->profile->line_id) ? auth()->user()->profile->line_id : '-' }}</span>
      </p>
      <p class="mx-0 mx-sm-3 mb-2 d-flex align-items-center">
        <i class="fs-5 d-block me-2 bi bi-whatsapp"></i>
        <span>{{ isset(auth()->user()->profile->whatsapp) ? auth()->user()->profile->whatsapp : '-' }}</span>
      </p>
    </div>
    @endif
  </div>
</div>