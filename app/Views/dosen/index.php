<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-chalkboard-teacher text-success"></i>
                Data Dosen
            </h1>

            <p class="text-muted mb-0">
                Manajemen data dosen Sistem Informasi Akademik
            </p>
        </div>

        <div class="d-flex gap-2">


            <!-- TAMBAH -->
            <a href="<?= base_url('dosen/tambah') ?>" class="btn btn-success shadow-sm">
                <i class="fas fa-plus"></i> Tambah Dosen
            </a>

        </div>
    </div>

    <!-- CARD -->
    <div class="card">

        <!-- HEADER CARD -->
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title mb-2 mb-md-0">
                <i class="fas fa-table mr-2"></i>
                Tabel Dosen
            </h3>

            <div class="d-flex align-items-center">

                <!-- SEARCH -->
                <div class="input-group mr-3" style="width: 260px;">

                    <input type="text"
                           id="searchDosen"
                           class="form-control"
                           placeholder="Cari dosen...">

                    <div class="input-group-append">
                        <span class="input-group-text bg-success text-white">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>

                </div>

                <!-- TOTAL -->
                <span class="badge badge-success p-2">
                    Total: <?= count($dosen) ?> Dosen
                </span>

            </div>
        </div>

        <!-- BODY -->
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped" id="tableDosen">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(empty($dosen)): ?>

                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Data dosen belum tersedia
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php $no = 1; ?>
                        <?php foreach ($dosen as $d): ?>

                        <tr>

                            <td class="text-center">
                                <?= $no++ ?>
                            </td>

                            <td>
                                <span class="badge badge-light">
                                    <?= $d['nidn'] ?>
                                </span>
                            </td>

                            <td>
                                <strong><?= $d['nama_dosen'] ?></strong>
                            </td>

                            <td class="text-center">

                                <!-- EDIT -->
                                <a href="<?= base_url('dosen/edit/' . $d['nidn']) ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- HAPUS -->
                                <a href="<?= base_url('dosen/hapus/' . $d['nidn']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data dosen?')">

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

document.getElementById("searchDosen").addEventListener("keyup", function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#tableDosen tbody tr");

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
    background-color: rgba(40,167,69,0.05);
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
}

/* =========================================
   SEARCH
========================================= */
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

    .d-sm-flex{
        gap: 15px;
    }

    .input-group{
        width: 100% !important;
        margin-bottom: 10px;
    }

    .btn-success,
    .btn-secondary{
        width: 100%;
    }

    .card-header{
        flex-direction: column;
        align-items: stretch !important;
    }
}

</style>

<?= $this->endSection() ?>