<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-user-graduate text-primary"></i>
                Data Mahasiswa
            </h1>

            <p class="text-muted mb-0">
                Manajemen data mahasiswa Sistem Informasi Akademik
            </p>
        </div>

        <div class="d-flex gap-2">


            <!-- TAMBAH -->
            <a href="<?= base_url('mahasiswa/tambah') ?>" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus"></i> Tambah Mahasiswa
            </a>

        </div>
    </div>

    <!-- CARD -->
    <div class="card">

        <!-- CARD HEADER -->
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title mb-2 mb-md-0">
                <i class="fas fa-table mr-2"></i>
                Tabel Mahasiswa
            </h3>

            <div class="d-flex align-items-center">

                <!-- SEARCH -->
                <div class="input-group mr-3" style="width: 260px;">
                    <input type="text"
                           id="searchMahasiswa"
                           class="form-control"
                           placeholder="Cari mahasiswa...">

                    <div class="input-group-append">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>

                <!-- TOTAL -->
                <span class="badge badge-primary p-2">
                    Total: <?= count($mahasiswa) ?> Mahasiswa
                </span>

            </div>
        </div>

        <!-- CARD BODY -->
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped" id="tableMahasiswa">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Angkatan</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(empty($mahasiswa)): ?>

                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Data mahasiswa belum tersedia
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php $no = 1; ?>
                        <?php foreach ($mahasiswa as $m): ?>

                        <tr>
                            <td class="text-center"><?= $no++ ?></td>

                            <td>
                                <span class="badge badge-light">
                                    <?= $m['nim'] ?>
                                </span>
                            </td>

                            <td>
                                <strong><?= $m['nama_mahasiswa'] ?></strong>
                            </td>

                            <td class="text-center">
                                <?= $m['angkatan'] ?>
                            </td>

                            <td class="text-center">

                                <a href="<?= base_url('mahasiswa/edit/' . $m['nim']) ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="<?= base_url('mahasiswa/hapus/' . $m['nim']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data mahasiswa?')">

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

<!-- KEMBALI -->
            <a href="<?= base_url('/') ?>" class="btn btn-secondary shadow-sm mr-2">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>

<!-- SEARCH SCRIPT -->
<script>

document.getElementById("searchMahasiswa").addEventListener("keyup", function() {

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#tableMahasiswa tbody tr");

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
    background-color: rgba(78,115,223,0.05);
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

    .btn-primary,
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