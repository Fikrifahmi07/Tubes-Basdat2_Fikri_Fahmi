<h1>Tambah Dosen</h1>

<form action="<?= base_url('dosen/simpan') ?>" method="post">
    <p>
        NIDN:<br>
        <input type="text" name="nidn" required>
    </p>

    <p>
        Nama Dosen:<br>
        <input type="text" name="nama_dosen" required>
    </p>

    <button type="submit">Simpan</button>
</form>