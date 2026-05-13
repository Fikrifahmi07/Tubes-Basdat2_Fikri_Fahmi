<h3 style="color:white;">SIDEBAR AKTIF</h3>
<aside class="main-sidebar sidebar-dark-success elevation-4">

  <!-- Brand -->
  <a href="<?= base_url() ?>" class="brand-link">
    <span class="brand-text font-weight-light">SIAKAD UNIPI</span>
  </a>

  <div class="sidebar">

    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

        <li class="nav-item">
          <a href="<?= base_url('/') ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
    <a href="<?= base_url('schema') ?>" class="nav-link">
        <i class="nav-icon fas fa-database"></i>
        <p>Schema DB</p>
    </a>
</li>

        <li class="nav-header">DATA MASTER</li>

        <li class="nav-item">
          <a href="<?= base_url('mahasiswa') ?>" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>Mahasiswa</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('dosen') ?>" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>Dosen</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('matakuliah') ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Mata Kuliah</p>
          </a>
        </li>

        <li class="nav-item">
    <a href="<?= base_url('kelas') ?>" class="nav-link">
        <i class="nav-icon fas fa-door-open"></i>
        <p>Kelas</p>
    </a>

        <li class="nav-header">AKADEMIK</li>

        <li class="nav-item">
          <a href="<?= base_url('nilai') ?>" class="nav-link">
            <i class="nav-icon fas fa-star"></i>
            <p>Nilai</p>
          </a>
        </li>

        <li class="nav-item">
    <a href="<?= base_url('log-aktivitas') ?>" class="nav-link">
        <i class="nav-icon fas fa-history"></i>
        <p>Log Aktivitas</p>
    </a>
</li>

        <li class="nav-item">
          <a href="<?= base_url('transkrip') ?>" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Transkrip</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('laporan') ?>" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>Laporan</p>
          </a>
        </li>

        <li class="nav-item mt-3">
          <a href="<?= base_url('logout') ?>" class="nav-link bg-danger">

            <i class="nav-icon fas fa-sign-out-alt"></i>

            <p>
              Logout
            </p>

          </a>
        </li>

      </ul>
    </nav>

  </div>
</aside>