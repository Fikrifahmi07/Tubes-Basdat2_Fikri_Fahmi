<h1>Edit Dosen</h1>

<form action="<?= base_url('dosen/update/' . $dosen['nidn']) ?>" method="post">
    <p>
        NIDN:<br>
        <input type="text" value="<?= $dosen['nidn'] ?>" readonly>
    </p>

    <p>
        Nama Dosen:<br>
        <input type="text" name="nama_dosen" value="<?= $dosen['nama_dosen'] ?>" required>
    </p>

    <button type="submit">Update</button>
</form>