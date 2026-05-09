<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-chart-line text-success"></i>
                Data Nilai Mahasiswa
            </h1>

            <p class="text-muted mb-0">
                Kelola data nilai mahasiswa dan monitoring akademik
            </p>
        </div>

        <!-- BUTTON -->
        <div>

            <!-- DASHBOARD -->
            <a href="<?= base_url('/') ?>" class="btn btn-secondary shadow-sm mr-2">
                <i class="fas fa-arrow-left"></i>
                Dashboard
            </a>

            <!-- TAMBAH -->
            <a href="<?= base_url('nilai/tambah') ?>" class="btn btn-success shadow-sm">
                <i class="fas fa-plus"></i>
                Tambah Nilai
            </a>

        </div>

    </div>

    <!-- ALERT SUCCESS -->
    <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fas fa-check-circle"></i>
            <?= session()->getFlashdata('success') ?>

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    <?php endif; ?>

    <!-- ALERT ERROR -->
    <?php if(session()->getFlashdata('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="fas fa-exclamation-circle"></i>
            <?= session()->getFlashdata('error') ?>

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    <?php endif; ?>

    <!-- CARD -->
    <div class="card">

        <!-- CARD HEADER -->
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title mb-2 mb-md-0">

                <i class="fas fa-table mr-2"></i>
                Tabel Nilai Mahasiswa

            </h3>

            <!-- SEARCH -->
            <div class="input-group search-box">

                <input type="text"
                       id="searchNilai"
                       class="form-control"
                       placeholder="Cari mahasiswa / matkul...">

                <div class="input-group-append">

                    <span class="input-group-text bg-success text-white">
                        <i class="fas fa-search"></i>
                    </span>

                </div>

            </div>

        </div>

        <!-- CARD BODY -->
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped"
                   id="tableNilai">

                <thead>

                    <tr>
                        <th width="60">No</th>
                        <th>Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>Nilai</th>
                        <th>Grade</th>
                        <th width="180">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if(empty($nilai)): ?>

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted">

                                Data nilai belum tersedia

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php $no = 1; ?>

                        <?php foreach($nilai as $n): ?>

                        <tr>

                            <!-- NO -->
                            <td class="text-center">
                                <?= $no++ ?>
                            </td>

                            <!-- MAHASISWA -->
                            <td>

                                <strong>
                                    <?= $n['nama_mahasiswa'] ?>
                                </strong>

                            </td>

                            <!-- MATA KULIAH -->
                            <td>
                                    <?= $n['nama_mk'] ?>
                            </td>

                            <!-- NILAI -->
                            <td class="text-center">

                                <?php
                                    $badge =
                                        $n['nilai_akhir'] >= 85 ? 'success' :
                                        ($n['nilai_akhir'] >= 70 ? 'primary' :
                                        ($n['nilai_akhir'] >= 60 ? 'warning' : 'danger'));
                                ?>

                                

                                    <?= $n['nilai_akhir'] ?>

                                

                            </td>

                            <!-- GRADE -->
                            <td class="text-center">

                                    <?= $n['grade'] ?>

                            </td>

                            <!-- AKSI -->
                            <td class="text-center">

                                <!-- EDIT -->
                                <a href="<?= base_url('nilai/edit/' . $n['id_nilai']) ?>"
                                   class="btn btn-sm btn-primary">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <!-- HAPUS -->
                                <a href="<?= base_url('nilai/hapus/' . $n['id_nilai']) ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin hapus data nilai?')">

                                    <i class="fas fa-trash"></i>
                                    Hapus

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

<!-- SEARCH -->
<script>

document.getElementById("searchNilai").addEventListener("keyup", function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#tableNilai tbody tr");

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
    background: rgba(40,167,69,0.05);
}

/* BADGE */
.badge{
    padding: 7px 12px;
    border-radius: 8px;
    font-size: 0.85rem;
}

/* BUTTON */
.btn{
    border-radius: 8px;
}

/* SEARCH */
.search-box{
    width: 280px;
}

.form-control{
    border-radius: 8px;
}

.input-group-text{
    border-radius: 0 8px 8px 0;
}

/* ALERT */
.alert{
    border-radius: 10px;
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