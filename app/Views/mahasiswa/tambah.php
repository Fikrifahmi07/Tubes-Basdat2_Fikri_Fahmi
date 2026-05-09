<h1>Tambah Mahasiswa</h1>

<form action="<?= base_url('mahasiswa/simpan') ?>" method="post">
    <p>
        NIM:<br>
        <input type="text" name="nim" required>
    </p>

    <p>
        Nama Mahasiswa:<br>
        <input type="text" name="nama_mahasiswa" required>
    </p>

    <p>
        Angkatan:<br>
        <input type="number" name="angkatan" required>
    </p>

    <button type="submit">Simpan</button>
</form>

<a href="<?= base_url('mahasiswa/tambah') ?>">