<h1>Edit Mahasiswa</h1>

<form action="<?= base_url('mahasiswa/update/' . $mahasiswa['nim']) ?>" method="post">
    <p>
        NIM:<br>
        <input type="text" value="<?= $mahasiswa['nim'] ?>" readonly>
    </p>

    <p>
        Nama Mahasiswa:<br>
        <input type="text" name="nama_mahasiswa" value="<?= $mahasiswa['nama_mahasiswa'] ?>" required>
    </p>

    <p>
        Angkatan:<br>
        <input type="number" name="angkatan" value="<?= $mahasiswa['angkatan'] ?>" required>
    </p>

    <button type="submit">Update</button>
</form>

<a href="<?= base_url('mahasiswa') ?>">Kembali</a>