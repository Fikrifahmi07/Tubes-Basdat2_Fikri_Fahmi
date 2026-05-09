<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-book text-warning"></i>
                Data Mata Kuliah
            </h1>

            <p class="text-muted mb-0">
                Kelola data mata kuliah sistem akademik
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
            <a href="<?= base_url('matakuliah/tambah') ?>" class="btn btn-warning shadow-sm text-white">
                <i class="fas fa-plus"></i>
                Tambah Mata Kuliah
            </a>

        </div>

    </div>

    <!-- ALERT -->
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

        <!-- HEADER CARD -->
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title mb-2 mb-md-0">

                <i class="fas fa-table mr-2"></i>
                Tabel Mata Kuliah

            </h3>

            <!-- SEARCH -->
            <div class="input-group search-box">

                <input type="text"
                       id="searchMatkul"
                       class="form-control"
                       placeholder="Cari mata kuliah...">

                <div class="input-group-append">

                    <span class="input-group-text bg-warning text-white">
                        <i class="fas fa-search"></i>
                    </span>

                </div>

            </div>

        </div>

        <!-- BODY -->
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped"
                   id="tableMatkul">

                <thead>

                    <tr>
                        <th width="60">No</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th width="180">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if(empty($matkul)): ?>

                        <tr>

                            <td colspan="5"
                                class="text-center text-muted">

                                Data mata kuliah belum tersedia

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php $no = 1; ?>

                        <?php foreach($matkul as $m): ?>

                        <tr>

                            <!-- NO -->
                            <td class="text-center">
                                <?= $no++ ?>
                            </td>

                            <!-- KODE -->
                            <td>
                                    <?= $m['kode_mk'] ?>
                            </td>

                            <!-- NAMA -->
                            <td>

                                <strong>
                                    <?= $m['nama_mk'] ?>
                                </strong>

                            </td>

                            <!-- SKS -->
                            <td class="text-center">

                                    <?= $m['sks'] ?> SKS
                                
                            </td>

                            <!-- AKSI -->
                            <td class="text-center">

                                <!-- EDIT -->
                                <a href="<?= base_url('matakuliah/edit/' . $m['kode_mk']) ?>"
                                   class="btn btn-sm btn-primary">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <!-- HAPUS -->
                                <a href="<?= base_url('matakuliah/hapus/' . $m['kode_mk']) ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin hapus data mata kuliah?')">

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

document.getElementById("searchMatkul").addEventListener("keyup", function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("#tableMatkul tbody tr");

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
    background: rgba(255,193,7,0.08);
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
    width: 260px;
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