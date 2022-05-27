<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      {{-- <img src="/img/logo-epc.svg" class="logo-icon" alt="logo icon"> --}}
    </div>
    <div>
      <h5 class="logo-text" style="font-size: 18px">Admin ECS</h5>
    </div>
    <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li class="{{ Request::is('admin') ? 'mm-active' : '' }}">
      <a href="/admin">
        <div class="parent-icon"><i class="bi bi-house-door"></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>

    <li class="menu-label mt-0">Admin</li>
    <li class="{{ Request::is('admin/data') ? 'mm-active' : '' }}">
      <a href="/admin/data">
        <div class="parent-icon"><i class="bi bi-person-check-fill"></i>
        </div>
        <div class="menu-title">Data Admin</div>
      </a>
    </li>
    
    <li class="menu-label mt-0">Peserta</li>
    <li class="{{ Request::is('admin/pendaftar') ? 'mm-active' : '' }}">
      <a href="/admin/pendaftar">
        <div class="parent-icon"><i class="bi bi-person-plus-fill"></i>
        </div>
        <div class="menu-title">Pendaftar</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/kelompok') ? 'mm-active' : '' }}">
      <a href="/admin/kelompok">
        <div class="parent-icon"><i class="bi bi-people-fill"></i>
        </div>
        <div class="menu-title">Kelompok</div>
      </a>
    </li>

    <li class="menu-label mt-0">Pengaturan Dashboard</li>
    <li class="{{ Request::is('admin/pengumuman') ? 'mm-active' : '' }}">
      <a href="/admin/pengumuman">
        <div class="parent-icon"><i class="bi bi-megaphone"></i>
        </div>
        <div class="menu-title">Pengumuman</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/modul') ? 'mm-active' : '' }}">
      <a href="/admin/modul">
        <div class="parent-icon"><i class="bi bi-journal-text"></i>
        </div>
        <div class="menu-title">Modul</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/jadwal') ? 'mm-active' : '' }}">
      <a href="/admin/jadwal">
        <div class="parent-icon"><i class="bi bi-calendar-week"></i>
        </div>
        <div class="menu-title">Jadwal</div>
      </a>
    </li>
    
    <li class="menu-label mt-0">Progress Pelatihan</li>
    <li class="{{ Request::is('admin/progress') ? 'mm-active' : '' }}">
      <a href="/admin/progress">
        <div class="parent-icon"><i class="bi bi-bar-chart-line"></i>
        </div>
        <div class="menu-title">Rekap Progress</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/kehadiran**') ? 'mm-active' : '' }}">
      <a href="#" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-calendar-check"></i>
        </div>
        <div class="menu-title">Kehadiran</div>
      </a>
      <ul class="mm-collapse {{ Request::is('admin/kehadiran**') ? 'mm-show' : '' }}">
        <li class="{{ Request::is('admin/kehadiran/briefing') ? 'mm-active' : '' }}"> 
          <a href="/admin/kehadiran/briefing"><i class="bi bi-arrow-right-short"></i>Briefing Pelatihan</a>
        </li>
        <li class="{{ Request::is('admin/kehadiran/p1') ? 'mm-active' : '' }}"> 
          <a href="/admin/kehadiran/p1"><i class="bi bi-arrow-right-short"></i>P1 Dasar C++</a>
        </li>
        <li class="{{ Request::is('admin/kehadiran/p2') ? 'mm-active' : '' }}"> 
          <a href="/admin/kehadiran/p2"><i class="bi bi-arrow-right-short"></i>P2 GUI</a>
        </li>
        <li class="{{ Request::is('admin/kehadiran/p3') ? 'mm-active' : '' }}"> 
          <a href="/admin/kehadiran/p3"><i class="bi bi-arrow-right-short"></i>P3 Database</a>
        </li>
        <li class="{{ Request::is('admin/kehadiran/presbar1') ? 'mm-active' : '' }}"> 
          <a href="/admin/kehadiran/presbar1"><i class="bi bi-arrow-right-short"></i>Presbar 1</a>
        </li>
        <li class="{{ Request::is('admin/kehadiran/presbar2') ? 'mm-active' : '' }}"> 
          <a href="/admin/kehadiran/presbar2"><i class="bi bi-arrow-right-short"></i>Presbar 2</a>
        </li>
      </ul>
    </li>
    <li class="{{ Request::is('admin/penugasan**') ? 'mm-active' : '' }}">
      <a href="#" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-journal-check"></i>
        </div>
        <div class="menu-title">Penugasan</div>
      </a>
      <ul class="mm-collapse {{ Request::is('admin/penugasan**') ? 'mm-show' : '' }}">
        <li class="{{ Request::is('admin/penugasan/p1') ? 'mm-active' : '' }}"> 
          <a href="/admin/penugasan/p1"><i class="bi bi-arrow-right-short"></i>P1 Dasar C++</a>
        </li>
        <li class="{{ Request::is('admin/penugasan/p2') ? 'mm-active' : '' }}"> 
          <a href="/admin/penugasan/p2"><i class="bi bi-arrow-right-short"></i>P2 GUI</a>
        </li>
        <li class="{{ Request::is('admin/penugasan/fp') ? 'mm-active' : '' }}"> 
          <a href="/admin/penugasan/fp"><i class="bi bi-arrow-right-short"></i>Final Project</a>
        </li>
      </ul>
    </li>
    
    {{-- Database Menu --}}
    {{-- <li class="menu-label mt-0">Monitoring</li> --}}

  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->