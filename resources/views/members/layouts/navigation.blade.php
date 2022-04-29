<ul class="nav nav-tabs nav-fill mb-4">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Pengumuman</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('berkas') ? 'active' : '' }}" href="/berkas">Berkas Pelatihan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('penugasan') ? 'active' : '' }}" href="/penugasan">Penugasan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('jadwal') ? 'active' : '' }}" href="/jadwal">Jadwal</a>
  </li>
</ul>