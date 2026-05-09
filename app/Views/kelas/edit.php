<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3>Edit Kelas</h3>
    </div>

    <div class="card-body">
        <form action="<?= base_url('kelas/update/'.$kelas['id_kelas']) ?>" method="post">

            <div class="form-group">
                <label>Mata Kuliah</label>
                <select name="kode_mk" class="form-control" required>
                    <?php foreach ($matkul as $m): ?>
                        <option value="<?= $m['kode_mk'] ?>"
                            <?= $kelas['kode_mk'] == $m['kode_mk'] ? 'selected' : '' ?>>
                            <?= $m['nama_mk'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Dosen</label>
                <select name="nidn" class="form-control" required>
                    <?php foreach ($dosen as $d): ?>
                        <option value="<?= $d['nidn'] ?>"
                            <?= $kelas['nidn'] == $d['nidn'] ? 'selected' : '' ?>>
                            <?= $d['nama_dosen'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <input type="number" 
                       name="semester" 
                       class="form-control"
                       value="<?= $kelas['semester'] ?>" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="<?= base_url('kelas') ?>" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

<?= $this->endSection() ?>