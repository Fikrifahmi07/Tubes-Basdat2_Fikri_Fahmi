<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-chart-bar text-danger"></i>
                Laporan Akademik
            </h1>

            <p class="text-muted mb-0">
                Data statistik akademik mahasiswa dan dosen
            </p>
        </div>

        <a href="<?= base_url('/') ?>" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>

    </div>

    <!-- NAVIGASI TABEL -->
    <div class="card mb-4 shadow-sm border-0">

        <div class="card-header bg-white">
            <h5 class="mb-0">
                <i class="fas fa-search mr-2 text-primary"></i>
                Cari & Lompat ke Tabel
            </h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-3 mb-2">
                    <a href="#dosenTable" class="btn btn-primary btn-block">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Mata Kuliah per Dosen
                    </a>
                </div>

                <div class="col-md-3 mb-2">
                    <a href="#unggulTable" class="btn btn-success btn-block">
                        <i class="fas fa-user-graduate"></i>
                        Mahasiswa Unggul
                    </a>
                </div>

                <div class="col-md-3 mb-2">
                    <a href="#belumNilaiTable" class="btn btn-warning btn-block text-white">
                        <i class="fas fa-exclamation-circle"></i>
                        Belum Ada Nilai
                    </a>
                </div>

                <div class="col-md-3 mb-2">
                    <a href="#statistikTable" class="btn btn-danger btn-block">
                        <i class="fas fa-chart-line"></i>
                        Statistik Nilai
                    </a>
                </div>

            </div>

        </div>

    </div>

    <!-- DOSEN -->
    <div class="card shadow-sm border-0 mb-4" id="dosenTable">

        <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap">

            <h5 class="mb-2 mb-md-0">
                <i class="fas fa-chalkboard-teacher text-primary mr-2"></i>
                Mata Kuliah per Dosen
            </h5>

            <div class="search-box">
                <input type="text"
                       id="searchDosen"
                       class="form-control"
                       placeholder="Cari dosen...">
            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover" id="tableDosen">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Dosen</th>
                        <th width="200">Jumlah Mata Kuliah</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($dosen as $d): ?>

                    <tr>
                        <td class="text-center"><?= $no++ ?></td>

                        <td><?= $d['nama_dosen'] ?></td>

                        <td class="text-center">
                            <?= $d['jumlah_mata_kuliah'] ?>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- MAHASISWA UNGGUL -->
    <div class="card shadow-sm border-0 mb-4" id="unggulTable">

        <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap">

            <h5 class="mb-2 mb-md-0">
                <i class="fas fa-user-graduate text-success mr-2"></i>
                Mahasiswa Unggul
            </h5>

            <div class="search-box">
                <input type="text"
                       id="searchUnggul"
                       class="form-control"
                       placeholder="Cari mahasiswa...">
            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover" id="tableUnggul">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th width="120">Angkatan</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($mahasiswa_unggul as $m): ?>

                    <tr>

                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $m['nim'] ?></td>
                        <td><?= $m['nama_mahasiswa'] ?></td>
                        <td class="text-center"><?= $m['angkatan'] ?></td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- BELUM ADA NILAI -->
    <div class="card shadow-sm border-0 mb-4" id="belumNilaiTable">

        <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap">

            <h5 class="mb-2 mb-md-0">
                <i class="fas fa-exclamation-circle text-warning mr-2"></i>
                Mahasiswa Belum Memiliki Nilai
            </h5>

            <div class="search-box">
                <input type="text"
                       id="searchBelum"
                       class="form-control"
                       placeholder="Cari mahasiswa...">
            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover" id="tableBelum">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($mahasiswa_belum_nilai as $b): ?>

                    <tr>

                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $b['nim'] ?></td>
                        <td><?= $b['nama_mahasiswa'] ?></td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- STATISTIK NILAI -->
    <div class="card shadow-sm border-0 mb-4" id="statistikTable">

        <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap">

            <h5 class="mb-2 mb-md-0">
                <i class="fas fa-chart-line text-danger mr-2"></i>
                Statistik Nilai Mata Kuliah
            </h5>

            <div class="search-box">
                <input type="text"
                       id="searchStatistik"
                       class="form-control"
                       placeholder="Cari mata kuliah...">
            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover" id="tableStatistik">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Mata Kuliah</th>
                        <th width="140">Peserta</th>
                        <th width="140">Rata-rata</th>
                        <th width="140">Tertinggi</th>
                        <th width="140">Terendah</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($statistik_nilai as $s): ?>

                    <tr>

                        <td class="text-center"><?= $no++ ?></td>

                        <td><?= $s['nama_mk'] ?></td>

                        <td class="text-center"><?= $s['peserta'] ?></td>

                        <td class="text-center">
                            <?= $s['rata_rata'] ?>
                        </td>

                        <td class="text-center">
                            <?= $s['tertinggi'] ?>
                        </td>

                        <td class="text-center">
                            <?= $s['terendah'] ?>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- SEARCH SCRIPT -->
<script>

function searchTable(inputId, tableId){

    document.getElementById(inputId).addEventListener("keyup", function(){

        let filter = this.value.toLowerCase();

        let rows = document.querySelectorAll(`#${tableId} tbody tr`);

        rows.forEach(function(row){

            let text = row.innerText.toLowerCase();

            row.style.display = text.includes(filter)
                ? ""
                : "none";

        });

    });

}

searchTable("searchDosen", "tableDosen");
searchTable("searchUnggul", "tableUnggul");
searchTable("searchBelum", "tableBelum");
searchTable("searchStatistik", "tableStatistik");

</script>

<style>

.card{
    border-radius: 14px;
    overflow: hidden;
}

.card-header{
    padding: 16px 20px;
}

.table thead th{
    background: #f8f9fa;
    text-align: center;
    vertical-align: middle;
}

.table tbody td{
    vertical-align: middle;
}

.table-hover tbody tr:hover{
    background: rgba(0,123,255,0.04);
}

.search-box{
    width: 260px;
}

html{
    scroll-behavior: smooth;
}

@media(max-width:768px){

    .search-box{
        width: 100%;
        margin-top: 10px;
    }

}

</style>

<?= $this->endSection() ?>