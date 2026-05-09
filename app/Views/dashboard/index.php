<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- PAGE HEADER -->
<div class="dashboard-hero mb-4">
    <div class="hero-content d-flex justify-content-between align-items-center flex-wrap">
        
        <div>
            <h1 class="campus-title mb-1">UNIVERSITAS PERSATUAN ISLAM</h1>
            <h5 class="system-title mb-2">Sistem Informasi Akademik (SIAKAD)</h5>
            <p class="mb-0 hero-subtitle">
                Dashboard Monitoring Data Akademik Mahasiswa
            </p>
        </div>

        <div class="hero-logo">
           <img src="/assets/img/logo.png" alt="Logo Kampus">
        </div>

    </div>
</div>

<!-- STAT CARDS -->
<div class="row">

    <div class="col-lg-3 col-6">
        <a href="<?= base_url('mahasiswa') ?>" class="text-decoration-none text-dark">
            <div class="small-box bg-info shadow-sm">
                <div class="inner">
                    <h3><?= $mhs ?></h3>
                    <p>Mahasiswa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-6">
        <a href="<?= base_url('dosen') ?>" class="text-decoration-none text-dark">
            <div class="small-box bg-success shadow-sm">
                <div class="inner">
                    <h3><?= $dsn ?></h3>
                    <p>Dosen</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-6">
        <a href="<?= base_url('matakuliah') ?>" class="text-decoration-none text-dark">
            <div class="small-box bg-warning shadow-sm">
                <div class="inner">
                    <h3><?= $mk ?></h3>
                    <p>Mata Kuliah</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-6">
        <a href="<?= base_url('laporan') ?>" class="text-decoration-none text-dark">
            <div class="small-box bg-danger shadow-sm">
                <div class="inner">
                    <h3><?= number_format($avg_nilai, 1) ?></h3>
                    <p>Rata-rata Nilai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </a>
    </div>

</div>

<!-- REKAP IPK -->
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0">
            <i class="fas fa-chart-bar mr-2"></i>
            Rekap IPK Mahasiswa
        </h3>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-striped mb-0">
            <thead class="thead-light">
                <tr>
                    <th width="60">No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th width="120">IPK</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rekap_ipk)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($rekap_ipk as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r['nim'] ?></td>
                        <td><?= $r['nama_mahasiswa'] ?></td>
                        <td>
                            <span class="badge badge-success px-3 py-2">
                                <?= number_format($r['ipk'], 2) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Belum ada data rekap IPK.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>

/* ======================================================
   BACKGROUND
====================================================== */
.content-wrapper{
    background-color: #f4f6f9;
    min-height: 100vh;
    padding: 20px;
}

/* ======================================================
   HERO DASHBOARD
====================================================== */
.dashboard-hero{
    background: linear-gradient(135deg, #4e73df, #224abe);
    color: white;
    padding: 35px;
    border-radius: 18px;
    box-shadow: 0 10px 28px rgba(0,0,0,0.15);
    position: relative;
    overflow: hidden;
    margin-bottom: 30px;
}

/* dekorasi lingkaran */
.dashboard-hero::before{
    content: '';
    position: absolute;
    right: -50px;
    top: -50px;
    width: 220px;
    height: 220px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
}

.dashboard-hero::after{
    content: '';
    position: absolute;
    right: 80px;
    bottom: -60px;
    width: 140px;
    height: 140px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
}

/* isi hero */
.hero-content{
    position: relative;
    z-index: 2;
}

/* ======================================================
   JUDUL
====================================================== */
.campus-title{
    font-size: 2.3rem;
    font-weight: 800;
    letter-spacing: 1px;
    margin-bottom: 8px;
    text-transform: uppercase;
}

.system-title{
    font-size: 1.3rem;
    font-weight: 600;
    opacity: 0.95;
    margin-bottom: 10px;
}

.hero-subtitle{
    font-size: 0.95rem;
    opacity: 0.85;
    margin-bottom: 0;
}

/* ======================================================
   LOGO
====================================================== */
.hero-logo{
    text-align: right;
}

.hero-logo img{
    width: 95px;
    height: 95px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
    transition: 0.3s;
}

.hero-logo img:hover{
    transform: scale(1.05);
}

/* ======================================================
   SMALL BOX
====================================================== */
.small-box{
    transition: all 0.25s ease;
    cursor: pointer;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.small-box:hover{
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.small-box .inner{
    padding: 20px;
}

.small-box h3{
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 8px;
}

.small-box p{
    font-size: 1rem;
    margin-bottom: 0;
}

.small-box .icon{
    top: 15px;
    right: 15px;
}

.small-box .icon i{
    font-size: 60px;
    opacity: 0.2;
}

/* ======================================================
   CARD
====================================================== */
.card{
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
}

.card-header{
    padding: 16px 20px;
    border-bottom: 1px solid #eee;
}

.card-title{
    font-weight: 600;
    margin-bottom: 0;
}

/* ======================================================
   TABLE
====================================================== */
.table thead th{
    background: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    font-weight: 700;
    text-align: center;
}

.table tbody td{
    vertical-align: middle;
    text-align: center;
}

.table-hover tbody tr:hover{
    background-color: rgba(78,115,223,0.06);
}

/* ======================================================
   BADGE
====================================================== */
.badge{
    font-size: 0.9rem;
    border-radius: 8px;
    padding: 6px 10px;
}

/* ======================================================
   RESPONSIVE
====================================================== */
@media (max-width: 768px){

    .dashboard-hero{
        text-align: center;
        padding: 25px;
    }

    .campus-title{
        font-size: 1.8rem;
    }

    .system-title{
        font-size: 1.1rem;
    }

    .hero-logo{
        text-align: center;
        margin-top: 20px;
    }

    .hero-logo img{
        width: 75px;
        height: 75px;
    }
}

</style>

<?= $this->endSection() ?>