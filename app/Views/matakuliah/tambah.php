<h1>Tambah Mata Kuliah</h1>

<form action="<?= base_url('matakuliah/simpan') ?>" method="post">
    <p>Kode MK:<br><input type="text" name="kode_mk" required></p>
    <p>Nama MK:<br><input type="text" name="nama_mk" required></p>
    <p>SKS:<br><input type="number" name="sks" required></p>

    <button type="submit">Simpan</button>
</form>