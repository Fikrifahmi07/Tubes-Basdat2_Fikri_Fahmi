<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- PAGE HEADER -->
<div class="dashboard-hero mb-4">

    <div class="hero-circle hero-circle-1"></div>
    <div class="hero-circle hero-circle-2"></div>

    <div class="hero-content d-flex justify-content-between align-items-center flex-wrap">

        <div>
            <h1 class="campus-title mb-1">
                UNIVERSITAS PERSATUAN ISLAM
            </h1>

            <h5 class="system-title mb-2">
                Sistem Informasi Akademik (SIAKAD)
            </h5>

            <p class="mb-0 hero-subtitle">
                Dashboard Monitoring Data Akademik Mahasiswa
            </p>
        </div>

        <div class="hero-logo">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo Kampus">
        </div>

    </div>
</div>

<!-- STAT CARD -->
<div class="row">

    <!-- MAHASISWA -->
    <div class="col-lg-3 col-6">

        <a href="<?= base_url('mahasiswa') ?>"
           class="text-decoration-none text-white">

            <div class="small-box bg-info">

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

    <!-- DOSEN -->
    <div class="col-lg-3 col-6">

        <a href="<?= base_url('dosen') ?>"
           class="text-decoration-none text-white">

            <div class="small-box bg-success">

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

    <!-- MATKUL -->
    <div class="col-lg-3 col-6">

        <a href="<?= base_url('matakuliah') ?>"
           class="text-decoration-none text-white">

            <div class="small-box bg-warning">

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

    <!-- NILAI -->
    <div class="col-lg-3 col-6">

        <a href="<?= base_url('laporan') ?>"
           class="text-decoration-none text-white">

            <div class="small-box bg-danger">

                <div class="inner">
                    <h3><?= number_format($avg_nilai,1) ?></h3>
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
<div class="card">

    <div class="card-header bg-primary text-white">

        <h3 class="card-title mb-0">
            <i class="fas fa-chart-bar mr-2"></i>
            Rekap IPK Mahasiswa
        </h3>

    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-hover table-striped mb-0">

            <thead>

                <tr>
                    <th width="60">No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th width="120">IPK</th>
                </tr>

            </thead>

            <tbody>

            <?php if(!empty($rekap_ipk)): ?>

                <?php $no = 1; ?>

                <?php foreach($rekap_ipk as $r): ?>

                    <tr>

                        <td><?= $no++ ?></td>

                        <td><?= $r['nim'] ?></td>

                        <td><?= $r['nama_mahasiswa'] ?></td>

                        <td>
                            <span class="badge badge-success px-3 py-2">
                                <?= number_format($r['ipk'],2) ?>
                            </span>
                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="4"
                        class="text-center text-muted py-4">

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
    background-color:#f4f6f9;
    min-height:100vh;
    padding:20px;
}

/* ======================================================
   HERO
====================================================== */

.dashboard-hero{
    background:
        linear-gradient(
            135deg,
            #099a35,
            #0b6438
        );

    color:white;

    padding:35px;

    border-radius:18px;

    position:relative;

    overflow:hidden;

    margin-bottom:30px;

    box-shadow:
        0 10px 28px rgba(0,0,0,0.15);
}

/* circle */

.hero-circle{
    position:absolute;
    border-radius:50%;
    background:rgba(255,255,255,0.08);
}

.hero-circle-1{
    width:220px;
    height:220px;
    right:-50px;
    top:-50px;
}

.hero-circle-2{
    width:140px;
    height:140px;
    right:80px;
    bottom:-60px;
}

/* hero content */

.hero-content{
    position:relative;
    z-index:2;
}

/* ======================================================
   TITLE
====================================================== */

.campus-title{
    font-size:2.3rem;
    font-weight:800;
    letter-spacing:1px;
    text-transform:uppercase;
}

.system-title{
    font-size:1.3rem;
    font-weight:600;
}

.hero-subtitle{
    opacity:0.9;
}

/* ======================================================
   LOGO
====================================================== */

.hero-logo img{
    width:95px;
    height:95px;
    object-fit:contain;

    filter:
        drop-shadow(
            0 4px 8px rgba(0,0,0,0.2)
        );

    transition:0.3s;
}

.hero-logo img:hover{
    transform:scale(1.05);
}

/* ======================================================
   SMALL BOX
====================================================== */

.small-box{
    border-radius:14px;
    overflow:hidden;

    transition:0.25s;

    box-shadow:
        0 4px 12px rgba(0,0,0,0.08);
}

.small-box:hover{
    transform:translateY(-4px);

    box-shadow:
        0 8px 20px rgba(0,0,0,0.15);
}

.small-box .inner{
    padding:20px;
}

.small-box h3{
    font-size:2.2rem;
    font-weight:700;
}

.small-box p{
    font-size:1rem;
}

.small-box .icon{
    top:15px;
    right:15px;
}

.small-box .icon i{
    font-size:60px;
    opacity:0.2;
}

/* ======================================================
   CARD
====================================================== */

.card{
    border:none;

    border-radius:14px;

    overflow:hidden;

    box-shadow:
        0 4px 14px rgba(0,0,0,0.08);
}

.card-header{
    border:none;
    padding:16px 20px;
}

/* ======================================================
   TABLE
====================================================== */

.table thead th{
    background:#f8f9fa;

    border-bottom:
        2px solid #dee2e6;

    text-align:center;

    font-weight:700;
}

.table tbody td{
    text-align:center;
    vertical-align:middle;
}

.table-hover tbody tr:hover{
    background:
        rgba(78,115,223,0.06);
}

/* ======================================================
   BADGE
====================================================== */

.badge{
    border-radius:8px;
    font-size:0.9rem;
}

/* ======================================================
   SIDEBAR
====================================================== */

.main-sidebar{
    background:
        linear-gradient(
            180deg,
            #3f4140,
            #5a6a5f,
            #0b843b
        ) !important;
}

/* ======================================================
   NAVBAR
====================================================== */

.navbar{
    background:
        linear-gradient(
            90deg,
            #10bc5a,
            #22c55e
        ) !important;
}

/* ======================================================
   RESPONSIVE
====================================================== */

@media(max-width:768px){

    .dashboard-hero{
        text-align:center;
        padding:25px;
    }

    .campus-title{
        font-size:1.8rem;
    }

    .system-title{
        font-size:1.1rem;
    }

    .hero-logo{
        margin-top:20px;
        text-align:center;
    }

    .hero-logo img{
        width:75px;
        height:75px;
    }
/* ======================================================
   NAVBAR MODERN
====================================================== */
.main-header.navbar{
    background: linear-gradient(
        90deg,
        #797e7c,
        #c2cdc5
    ) !important;

    border: none !important;

    box-shadow: 0 4px 14px rgba(0,0,0,0.12);

    padding-top: 10px;
    padding-bottom: 10px;
}

.main-header .nav-link{
    color: white !important;
    font-weight: 500;
    transition: 0.3s;
}

.main-header .nav-link:hover{
    opacity: 0.8;
}

.main-header .fas{
    color: white !important;
}

.navbar-nav.ml-auto .nav-link{
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* ======================================================
   FOOTER MODERN
====================================================== */
.main-footer{
    background: white;
    border-top: 4px solid #22c55e;
    padding: 14px 20px;
    font-size: 15px;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
}

.main-footer strong{
    color: #166534;
}

/* ======================================================
   ANIMASI HALUS
====================================================== */
.main-header,
.main-footer{
    transition: all 0.3s ease;
}

}

</style>

<?= $this->endSection() ?>