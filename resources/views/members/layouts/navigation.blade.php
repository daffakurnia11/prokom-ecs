<ul class="nav nav-tabs nav-fill mb-4">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Pengumuman</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('berkas') ? 'active' : '' }}" href="/berkas">Berkas Pelatihan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('jadwal') ? 'active' : '' }}" href="/jadwal">Jadwal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('kelompok') ? 'active' : '' }}" href="/kelompok">Kelompok</a>
  </li>
</ul>