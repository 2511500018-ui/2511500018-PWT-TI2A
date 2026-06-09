<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Ekstrakulikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM ekstra_2511500018 WHERE id_ekstra_018='$id'"));

if(isset($_POST['tambah'])){
    $id_ekstra_018 = $_POST['id_ekstra_018'];
    $nama_ekstra_018 = $_POST['nama_ekstra_018'];
    $ket_018 = $_POST['ket_018'];
    $semester_018 = $_POST['semester_018'];
    $thn_ajaran_018 = $_POST['thn_ajaran_018'];

    $insert = mysqli_query($koneksi,"UPDATE ekstra_2511500018 SET nama_ekstra_018='$nama_ekstra_018', ket_018='$ket_018', semester_018='$semester_018', thn_ajaran_018='$thn_ajaran_018' WHERE id_ektra_018='$id_ekstra_018' ");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra_2511500018">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan</h4></div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        
                        <div class="form-group">
                            <label for="id_ekstra_018">Kode Ekstra</label>
                            <input type="text" name="id_ekstra_018" value="<?= $edit['id_ekstra_018']; ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_ekstra_018">Nama Ekstra</label>
                            <input type="text" name="nama_ekstra_018" value="<?= $edit['nama_ekstra_018']; ?>" id="nama_ekstra_018" placeholder="Nama ekstra" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="ket_018">Keterangan</label>
                            <input type="text" name="ket_018" value="<?= $edit['ket_018']; ?>" id="ket_018" placeholder="Keterangan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="semester_018">Semester</label>
                            <input type="text" name="semester_018" value="<?= $edit['semester_018']; ?>" id="semester_018" placeholder="Keterangan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="thn_ajaran_018">Tahun Ajaran</label>
                            <input type="text" name="thn_ajaran_018" value="<?= $edit['thn_ajaran_018']; ?>" id="thn_ajaran_018" placeholder="Tahun Ajaran" class="form-control">
                        </div>


                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>