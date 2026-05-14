<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card shadow">

    <div class="card-header bg-success text-white">
        <h3 class="card-title">
            <i class="fas fa-history mr-2"></i>
            Log Aktivitas Sistem
        </h3>
    </div>

    <div class="card-body">

        <!-- SEARCH -->
        <div class="mb-4">

            <input
                type="text"
                id="searchLog"
                class="form-control"
                placeholder="Cari semua aktivitas log...">

        </div>

        <!-- NAV TAB -->
        <ul class="nav nav-pills mb-4" id="log-tab" role="tablist">

            <li class="nav-item mr-2">
                <a class="nav-link active"
                   data-toggle="pill"
                   href="#nilai">
                    <i class="fas fa-chart-line mr-1"></i>
                    Log Nilai
                </a>
            </li>

            <li class="nav-item mr-2">
                <a class="nav-link"
                   data-toggle="pill"
                   href="#mahasiswa">
                    <i class="fas fa-user-graduate mr-1"></i>
                    Mahasiswa
                </a>
            </li>

            <li class="nav-item mr-2">
                <a class="nav-link"
                   data-toggle="pill"
                   href="#dosen">
                    <i class="fas fa-chalkboard-teacher mr-1"></i>
                    Dosen
                </a>
            </li>

            <li class="nav-item mr-2">
                <a class="nav-link"
                   data-toggle="pill"
                   href="#matkul">
                    <i class="fas fa-book mr-1"></i>
                    Mata Kuliah
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   data-toggle="pill"
                   href="#kelas">
                    <i class="fas fa-school mr-1"></i>
                    Kelas
                </a>
            </li>

        </ul>

        <!-- TAB CONTENT -->
        <div class="tab-content">

            <!-- =========================
                 LOG NILAI
            ========================== -->
            <div class="tab-pane fade show active" id="nilai">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="bg-light">

                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Nilai Lama</th>
                                <th>Nilai Baru</th>
                                <th>Aksi</th>
                                <th>Waktu</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach($log_nilai as $log): ?>

                            <tr class="log-item">

                                <td><?= $no++ ?></td>

                                <td><?= $log['nim'] ?></td>

                                <td><?= $log['nama_mahasiswa'] ?></td>

                                <td><?= $log['nama_mk'] ?></td>

                                <td>
                                    <span class="badge badge-danger">
                                        <?= $log['nilai_lama'] ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="badge badge-success">
                                        <?= $log['nilai_baru'] ?>
                                    </span>
                                </td>

                                <td>

                                    <?php if($log['aksi'] == 'INSERT'): ?>

                                        <span class="badge badge-primary">
                                            INSERT
                                        </span>

                                    <?php elseif($log['aksi'] == 'UPDATE'): ?>

                                        <span class="badge badge-warning">
                                            UPDATE
                                        </span>

                                    <?php else: ?>

                                        <span class="badge badge-danger">
                                            DELETE
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td><?= $log['waktu'] ?></td>

                            </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- =========================
                 LOG MAHASISWA
            ========================== -->
            <div class="tab-pane fade" id="mahasiswa">

                <?php foreach($log_mahasiswa as $log): ?>

                <div class="timeline-item log-item">

                    <div class="timeline-icon bg-success">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                    <div class="timeline-content">
                        <h6><?= $log['aktivitas'] ?></h6>
                        <small><?= $log['created_at'] ?></small>
                    </div>

                </div>

                <?php endforeach; ?>

            </div>

            <!-- =========================
                 LOG DOSEN
            ========================== -->
            <div class="tab-pane fade" id="dosen">

                <?php foreach($log_dosen as $log): ?>

                <div class="timeline-item log-item">

                    <div class="timeline-icon bg-warning">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>

                    <div class="timeline-content">
                        <h6><?= $log['aktivitas'] ?></h6>
                        <small><?= $log['created_at'] ?></small>
                    </div>

                </div>

                <?php endforeach; ?>

            </div>

            <!-- =========================
                 LOG MATA KULIAH
            ========================== -->
            <div class="tab-pane fade" id="matkul">

                <?php foreach($log_matakuliah as $log): ?>

                <div class="timeline-item log-item">

                    <div class="timeline-icon bg-info">
                        <i class="fas fa-book"></i>
                    </div>

                    <div class="timeline-content">
                        <h6><?= $log['aktivitas'] ?></h6>
                        <small><?= $log['created_at'] ?></small>
                    </div>

                </div>

                <?php endforeach; ?>

            </div>

            <!-- =========================
                 LOG KELAS
            ========================== -->
            <div class="tab-pane fade" id="kelas">

                <?php foreach($log_kelas as $log): ?>

                <div class="timeline-item log-item">

                    <div class="timeline-icon bg-danger">
                        <i class="fas fa-school"></i>
                    </div>

                    <div class="timeline-content">
                        <h6><?= $log['aktivitas'] ?></h6>
                        <small><?= $log['created_at'] ?></small>
                    </div>

                </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</div>

<style>

.nav-pills .nav-link{
    border-radius: 10px;
    padding: 10px 18px;
    font-weight: 600;
}

.timeline-item{
    display: flex;
    align-items: start;
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 12px;
    background: #f8f9fa;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.timeline-icon{
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 15px;
    font-size: 18px;
}

.timeline-content h6{
    margin-bottom: 5px;
    font-weight: 600;
}

.timeline-content small{
    color: #777;
}

</style>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const searchInput = document.getElementById('searchLog');

    searchInput.addEventListener('keyup', function(){

        let keyword = this.value.toLowerCase();

        // hanya cari di tab aktif
        let activeTab = document.querySelector('.tab-pane.active');

        let items = activeTab.querySelectorAll('.log-item');

        items.forEach(function(item){

            let text = item.textContent.toLowerCase();

            if(text.includes(keyword)){

                if(item.tagName === 'TR'){

                    item.style.display = 'table-row';

                }else{

                    item.style.display = 'flex';

                }

            }else{

                item.style.display = 'none';

            }

        });

    });

});

</script>

<?= $this->endSection() ?>