<h2>Tambah Nilai</h2>

<form action="<?= base_url('nilai/simpan') ?>" method="post">

    <label>Mahasiswa</label><br>
    <select name="nim" required>
        <?php foreach ($mahasiswa as $m): ?>
            <option value="<?= $m['nim'] ?>">
                <?= $m['nama_mahasiswa'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Kelas</label><br>
    <select name="id_kelas" required>
        <?php foreach ($kelas as $k): ?>
            <option value="<?= $k['id_kelas'] ?>">
                <?= $k['id_kelas'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Nilai Akhir</label><br>
    <input type="number" name="nilai_akhir" required>

    <br><br>

    <button type="submit">Simpan</button>
</form>