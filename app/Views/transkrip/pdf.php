<!DOCTYPE html>
<html>
<head>

    <title>Transkrip Nilai</title>

    <style>

        body{
            font-family: sans-serif;
        }

        h2,h4{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:8px;
            text-align:center;
        }

    </style>

</head>
<body>

    <h2>TRANSKRIP NILAI MAHASISWA</h2>

    <h4>SIAKAD UNIPI</h4>

    <p>
        <strong>NIM :</strong>
        <?= $mahasiswa['nim'] ?>
    </p>

    <p>
        <strong>Nama :</strong>
        <?= $mahasiswa['nama_mahasiswa'] ?>
    </p>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
            </tr>

        </thead>

        <tbody>

            <?php $no = 1; ?>
            <?php foreach($transkrip as $n): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= $n['nama_mk'] ?></td>

                <td><?= $n['sks'] ?></td>

                <td><?= $n['nilai_akhir'] ?></td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

    <h3>
        IPK : <?= $ipk ?>
    </h3>

</body>
</html>