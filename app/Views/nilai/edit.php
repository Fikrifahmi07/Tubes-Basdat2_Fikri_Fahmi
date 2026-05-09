<h2>Edit Nilai</h2>

<form action="<?= base_url('nilai/update') ?>" method="post">

    <input type="hidden" name="id_nilai" value="<?= $nilai['id_nilai'] ?>">

    <label>Nilai Baru</label><br>
    <input type="number" name="nilai_akhir" 
           value="<?= $nilai['nilai_akhir'] ?>" required>

    <br><br>

    <button type="submit">Update</button>
</form>