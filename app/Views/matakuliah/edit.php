<h1>Edit Mata Kuliah</h1>

<form action="<?= base_url('matakuliah/update/' . $matkul['kode_mk']) ?>" method="post">
    <p>Kode MK:<br>
        <input type="text" value="<?= $matkul['kode_mk'] ?>" readonly>
    </p>

    <p>Nama MK:<br>
        <input type="text" name="nama_mk" value="<?= $matkul['nama_mk'] ?>" required>
    </p>

    <p>SKS:<br>
        <input type="number" name="sks" value="<?= $matkul['sks'] ?>" required>
    </p>

    <button type="submit">Update</button>
</form>