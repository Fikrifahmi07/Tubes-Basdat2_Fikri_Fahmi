<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-door-open text-info"></i>
                Data Kelas
            </h1>

            <p class="text-muted mb-0">
                Manajemen data kelas perkuliahan
            </p>
        </div>

        <!-- TOMBOL -->
        <div>


            <!-- TAMBAH -->
            <a href="<?= base_url('kelas/tambah') ?>" class="btn btn-info shadow-sm text-white">
                <i class="fas fa-plus"></i> Tambah Kelas
            </a>

        </div>

    </div>

    <!-- CARD -->
    <div class="card">

        <!-- CARD HEADER -->
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

            <!-- JUDUL -->
            <h3 class="card-title mb-2 mb-md-0">
                <i class="fas fa-table mr-2"></i>
                Tabel Kelas
            </h3>

            <!-- SEARCH + TOTAL -->
            <div class="d-flex align-items-center flex-wrap">

                <!-- SEARCH -->
                <div class="input-group mr-3 search-box">

                    <input type="text"
                           id="searchKelas"
                           class="form-control"
                           placeholder="Cari kelas...">

                    <div class="input-group-append">
                        <span class="input-group-text bg-info text-white">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>

                </div>

                <!-- TOTAL -->
                <span class="badge badge-info p-2">
                    Total: <?= count($kelas) ?> Kelas
                </span>

            </div>

        </div>

        <!-- CARD BODY -->
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped" id="tableKelas">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>ID Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Semester</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(empty($kelas)): ?>

                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data kelas belum tersedia
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php $no = 1; ?>
                        <?php foreach ($kelas as $k): ?>

                        <tr>

                            <td class="text-center">
                                <?= $no++ ?>
                            </td>

                            <td class="text-center">
                                <span class="badge badge-light">
                                    <?= $k['id_kelas'] ?>
                                </span>
                            </td>

                            <td>
                                <strong><?= $k['nama_mk'] ?></strong>
                            </td>

                            <td>
                                <?= $k['nama_dosen'] ?>
                            </td>

                            <td class="text-center">
                                    Semester <?= $k['semester'] ?>
                            </td>

                            <td class="text-center">

                                <!-- EDIT -->
                                <a href="<?= base_url('kelas/edit/' . $k['id_kelas']) ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- HAPUS -->
                                <a href="<?= base_url('kelas/hapus/' . $k['id_kelas']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data kelas?')">

                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- DASHBOARD -->
            <a href="<?= base_url('/') ?>" class="btn btn-secondary shadow-sm mr-2">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>

<!-- SEARCH -->
<script>

document.getElementById("searchKelas").addEventListener("keyup", function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#tableKelas tbody tr");

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        if(text.includes(filter)){
            row.style.display = "";
        }else{
            row.style.display = "none";
        }

    });

});

</script>

<style>

/* =========================================
   CARD
========================================= */
.card{
    border: none;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 18px rgba(0,0,0,0.08);
}

.card-header{
    background: white;
    border-bottom: 1px solid #eee;
    padding: 18px 20px;
}

.card-title{
    font-weight: 600;
    color: #333;
}

/* =========================================
   TABLE
========================================= */
.table{
    margin-bottom: 0;
}

.table thead th{
    background: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    text-align: center;
    font-weight: 700;
    color: #444;
}

.table tbody td{
    vertical-align: middle;
}

.table-hover tbody tr:hover{
    background-color: rgba(23,162,184,0.05);
}

/* =========================================
   BUTTON
========================================= */
.btn{
    border-radius: 8px;
}

.btn-sm{
    padding: 6px 10px;
}

/* =========================================
   BADGE
========================================= */
.badge{
    font-size: 0.85rem;
    border-radius: 8px;
    padding: 6px 10px;
}

/* =========================================
   SEARCH
========================================= */
.search-box{
    width: 260px;
}

.form-control{
    border-radius: 8px;
}

.input-group-text{
    border-radius: 0 8px 8px 0;
}

/* =========================================
   RESPONSIVE
========================================= */
@media (max-width: 768px){

    .search-box{
        width: 100%;
        margin-bottom: 10px;
    }

    .card-header{
        flex-direction: column;
        align-items: stretch !important;
    }

    .btn-info,
    .btn-secondary{
        width: 100%;
        margin-bottom: 10px;
    }
}

</style>

<?= $this->endSection() ?>