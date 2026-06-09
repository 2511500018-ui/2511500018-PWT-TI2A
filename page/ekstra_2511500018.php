<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ekstrakulikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM ekstra_2511500018 where id_ekstra_018 = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500018">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_ekstra2511500018" class="btn btn-primary btn-sm">
                Tambah ekstrakulikuler
            </a>

            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>id ekstra</th>
                        <th>Nama ekstra</th>
                        <th>Keterangan</th>
                        <th>Semester</th>
                        <th>Tahun ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </tread>

                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM ekstra_2511500018");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
                ?>
                
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_ekstra_018']; ?></td>
                        <td><?= $result['nama_ekstra_018']; ?></td>
                        <td><?= $result['ket_018']; ?></td>
                        <td><?= $result['semester_018']; ?></td>
                        <td><?= $result['thn_ajaran_018']; ?></td>
                        <td>
                            <a href="index.php?page=ekstra_2511500018&action=hapus&id=<?= $result['id_ekstra_018'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_ekstra2511500018&id=<?= $result['id_ekstra_018'] ?>" title="">
                                <span class="badge badge-warning">Edit</span>
                            </a>
                        </td>
                    </tr>
                </tbody>

                <?php } ?>
            </table>
        </div>
    </div>
</div>