<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-file-alt text-primary"></i>
                Transkrip Mahasiswa
            </h1>

            <p class="text-muted mb-0">
                Pilih mahasiswa untuk melihat detail transkrip nilai
            </p>

        </div>

        <!-- BUTTON -->
        <div>

            <a href="<?= base_url('/') ?>"
               class="btn btn-secondary shadow-sm">

                <i class="fas fa-arrow-left"></i>
                Dashboard

            </a>

        </div>

    </div>

    <!-- CARD -->
    <div class="card">

        <!-- CARD HEADER -->
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

            <h3 class="card-title mb-2 mb-md-0">

                <i class="fas fa-users mr-2"></i>
                Daftar Mahasiswa

            </h3>

            <!-- SEARCH -->
            <div class="input-group search-box">

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

        </div>

        <!-- BODY -->
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped"
                   id="tableMahasiswa">

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

                            <td colspan="5"
                                class="text-center text-muted">

                                Data mahasiswa belum tersedia

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php $no = 1; ?>

                        <?php foreach($mahasiswa as $m): ?>

                        <tr>

                            <!-- NO -->
                            <td class="text-center">
                                <?= $no++ ?>
                            </td>

                            <!-- NIM -->
                            <td>
                                    <?= $m['nim'] ?>
                            </td>

                            <!-- NAMA -->
                            <td>

                                <strong>
                                    <?= $m['nama_mahasiswa'] ?>
                                </strong>

                            </td>

                            <!-- ANGKATAN -->
                            <td class="text-center">
                                    <?= $m['angkatan'] ?>
                            </td>

                            <!-- AKSI -->
                            <td class="text-center">

                                <a href="<?= base_url('transkrip/' . $m['nim']) ?>"
                                  class="btn btn-primary btn-sm">

                                    <i class="fas fa-eye"></i>
                                    Lihat Transkrip

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

document.getElementById("searchMahasiswa").addEventListener("keyup", function(){

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

<!-- STYLE -->
<style>

.content-wrapper{
    background: #f4f6f9;
}

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
}

.table thead th{
    background: #f8f9fc;
    text-align: center;
    vertical-align: middle;
}

.table tbody td{
    vertical-align: middle;
}

.table-hover tbody tr:hover{
    background: rgba(0,123,255,0.05);
}

.badge{
    padding: 7px 12px;
    border-radius: 8px;
}

.search-box{
    width: 260px;
}

.form-control{
    border-radius: 8px;
}

.input-group-text{
    border-radius: 0 8px 8px 0;
}

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