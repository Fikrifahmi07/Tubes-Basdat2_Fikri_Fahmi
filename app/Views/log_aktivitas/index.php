<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-history text-primary"></i>
                Log Aktivitas Sistem
            </h1>

            <p class="text-muted mb-0">
                Riwayat aktivitas transaksi nilai mahasiswa
            </p>
        </div>

        <!-- BUTTON -->
        <div>
            <a href="<?= base_url('/') ?>" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left"></i>
                Dashboard
            </a>
        </div>

    </div>

    <!-- CARD -->
    <div class="card">

        <!-- HEADER CARD -->
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title mb-2 mb-md-0">
                <i class="fas fa-table mr-2"></i>
                Data Log Aktivitas
            </h3>

            <!-- SEARCH -->
            <div class="input-group search-box">

                <input type="text"
                       id="searchLog"
                       class="form-control"
                       placeholder="Cari aktivitas...">

                <div class="input-group-append">
                    <span class="input-group-text bg-primary text-white">
                        <i class="fas fa-search"></i>
                    </span>
                </div>

            </div>

        </div>

        <!-- BODY -->
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped"
                   id="tableLog">

                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>Nilai Lama</th>
                        <th>Nilai Baru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(empty($log)): ?>

                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada aktivitas tercatat
                        </td>
                    </tr>

                    <?php else: ?>

                    <?php foreach ($log as $l): ?>

                    <tr>

                        <!-- WAKTU -->
                        <td>
                            <i class="far fa-clock text-secondary"></i>
                            <?= $l['waktu'] ?>
                        </td>

                        <!-- MAHASISWA -->
                        <td>
                            <strong><?= $l['nama_mahasiswa'] ?></strong>
                        </td>

                        <!-- MATA KULIAH -->
                        <td>
                            
                                <?= $l['nama_mk'] ?? '-' ?>
                            
                        </td>

                        <!-- NILAI LAMA -->
                        <td class="text-center">

                           
                                <?= $l['nilai_lama'] ?>
                           

                        </td>

                        <!-- NILAI BARU -->
                        <td class="text-center">

                            
                                <?= $l['nilai_baru'] ?? '-' ?>
                           

                        </td>

                        <!-- AKSI -->
                        <td>

                            <span class="badge badge-<?=
                                $l['aksi'] == 'UPDATE' ? 'warning' :
                                ($l['aksi'] == 'DELETE' ? 'danger' : 'success')
                            ?>">

                                <?php if($l['aksi'] == 'INSERT'): ?>

                                    <i class="fas fa-plus-circle"></i>
                                    INSERT

                                <?php elseif($l['aksi'] == 'UPDATE'): ?>

                                    <i class="fas fa-edit"></i>
                                    UPDATE

                                <?php elseif($l['aksi'] == 'DELETE'): ?>

                                    <i class="fas fa-trash"></i>
                                    DELETE

                                <?php else: ?>

                                    <?= $l['aksi'] ?>

                                <?php endif; ?>

                            </span>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- SEARCH -->
<script>

document.getElementById("searchLog").addEventListener("keyup", function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#tableLog tbody tr");

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

<!-- STYLE -->
<style>

.content-wrapper{
    background: #f4f6f9;
}

/* CARD */
.card{
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 18px rgba(0,0,0,0.08);
}

.card-header{
    background: white;
    border-bottom: 1px solid #eee;
    padding: 18px 22px;
}

.card-title{
    font-weight: 700;
    color: #333;
}

/* TABLE */
.table{
    margin-bottom: 0;
}

.table thead th{
    background: #f8f9fc;
    text-align: center;
    vertical-align: middle;
    font-weight: 700;
}

.table tbody td{
    vertical-align: middle;
}

.table-hover tbody tr:hover{
    background: rgba(0,123,255,0.05);
}

/* BADGE */
.badge{
    padding: 7px 12px;
    border-radius: 8px;
    font-size: 0.85rem;
}

/* SEARCH */
.search-box{
    width: 260px;
}

.form-control{
    border-radius: 8px;
}

.input-group-text{
    border-radius: 0 8px 8px 0;
}

/* RESPONSIVE */
@media (max-width:768px){

    .search-box{
        width: 100%;
        margin-top: 10px;
    }

    .card-header{
        flex-direction: column;
        align-items: stretch !important;
    }

}

</style>

<?= $this->endSection() ?>