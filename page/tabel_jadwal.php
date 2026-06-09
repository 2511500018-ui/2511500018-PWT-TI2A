<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tabel Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM tabel_jadwal where kd_jadwal = '$kd' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=tabel_jadwal">';
        }
    }
}
?>

            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>Kd Jadwal</th>
                        <th>Kd mapel</th>
                        <th>Kd guru</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                    </tr>
                </tread>

                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM tabel_jadwal");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
                ?>
                
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['kd_jadwal']; ?></td>
                        <td><?= $result['kd_mapel']; ?></td>
                        <td><?= $result['kd_guru']; ?></td>
                        <td><?= $result['hari']; ?></td>
                        <td><?= $result['jam_mulai']; ?></td>
                        <td><?= $result['jam_selesai']; ?></td>
                        <td>
                            <a href="index.php?page=jadwal&action=hapus&kd=<?= $result['kd_jadwal'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            
                            
                    </tr>
                </tbody>

                <?php } ?>
            </table>
        </div>
    </div>
</div>