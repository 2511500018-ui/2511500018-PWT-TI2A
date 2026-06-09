<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Jadwal Pelajaran</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin:20px;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .header h2,
        .header h3{
            margin:0;
        }

        .header p{
            margin:5px 0;
        }

        hr{
            border:1px solid #000;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        table, th, td{
            border:1px solid #000;
        }

        th{
            background:#dcdcdc;
            text-align:center;
            padding:8px;
        }

        td{
            padding:6px;
        }

        .ttd{
            width:100%;
            margin-top:50px;
        }

        .ttd td{
            border:none;
        }

        @media print{
            .btn-print{
                display:none;
            }
        }
    </style>
</head>

<body>

<button class="btn-print" onclick="window.print()">
    Cetak Jadwal
</button>

<div class="header">
    <h2>DATA JADWAL KELAS</h2>
    <h3>JADWAL PELAJARAN</h3>
    <p>Tahun Ajaran <?= date('Y'); ?>/<?= date('Y')+1; ?></p>
    <hr>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Guru</th>
            <th>Mata Pelajaran</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Kelas</th>
        </tr>
    </thead>

    <tbody>

    <?php

    $no = 1;

    $query = mysqli_query($koneksi,"
        SELECT
            tj.*,
            g.nm_guru,
            m.nm_mapel
        FROM tabel_jadwal tj
        LEFT JOIN guru g
            ON CONCAT('D-',LPAD(tj.kd_guru,3,'0')) = g.kd_guru
        LEFT JOIN mapel m
            ON CONCAT('M-',LPAD(tj.kd_mapel,3,'0')) = m.kd_mapel
        ORDER BY
            FIELD(tj.hari,
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'),
            tj.jam ASC
    ");

    while($data = mysqli_fetch_assoc($query)){
    ?>

        <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?= $data['nm_guru']; ?></td>
            <td><?= $data['nm_mapel']; ?></td>
            <td align="center"><?= $data['hari']; ?></td>
            <td align="center"><?= $data['jam']; ?></td>
            <td align="center"><?= $data['kelas']; ?></td>
        </tr>

    <?php } ?>

    </tbody>
</table>

<div class="ttd">
    <tr>
        <td width="70%"></td>
        <td align="center">
            Pangkalpinang, <?= date('d F Y'); ?>
            <br><br><br><br><br>

            <b>Administrator</b>
        </td>
    </tr>
</div>

<script>
window.onload = function(){
    window.print();
}
</script>

</body>
</html>