<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-file-alt"></i> Transkrip Mahasiswa
        </h3>
    </div>

    <div class="card-body">

        <!-- STATUS KELULUSAN -->
        <div class="alert alert-info">
            <strong>Status Kelulusan:</strong>
            <span class="badge badge-<?= $status_kelulusan == 'LULUS' ? 'success' : 'danger' ?>">
                <?= $status_kelulusan ?>
            </span>
        </div>

        <!-- TABEL TRANSKRIP -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($transkrip as $t): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t['nama_mk'] ?></td>
                        <td><?= $t['sks'] ?></td>
                        <td><?= $t['nilai_akhir'] ?></td>
                        <td>
                            <span class="badge badge-primary">
                                <?= $t['grade'] ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <a href="<?= base_url('transkrip') ?>" class="btn btn-secondary mt-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

    </div>
</div>

<a href="<?= base_url('transkrip/pdf/' . $transkrip[0]['nim']) ?>"
   target="_blank"
   class="btn btn-danger mb-3">

    <i class="fas fa-file-pdf"></i>
    Export PDF

</a>

<?= $this->endSection() ?>