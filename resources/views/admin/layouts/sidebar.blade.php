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

    <li class="menu-label mt-0">Database</li>
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
      </ul>
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
    
    {{-- Database Menu --}}
    {{-- <li class="menu-label mt-0">Monitoring</li> --}}

  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->