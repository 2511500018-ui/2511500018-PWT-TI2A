<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Informasi Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
$Nis = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM siswa WHERE Nis='$Nis'"));

if(isset($_POST['tambah'])){
    $kd_siswa = $_POST['Nis'];
    $Nm_siswa = $_POST['Nm_siswa'];
    $jenkel = $_POST['jenkel'];
    $Hp = $_POST['Hp'];
    $Id_kelas = $_POST['Id_kelas'];

    $insert = mysqli_query($koneksi,"UPDATE siswa SET Nm_siswa='$Nm_siswa', Id_kelas='$Id_kelas', jenkel='$jenkel', Hp='$Hp' WHERE Nis='$Nis' ");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
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
                            <label for="kd_siswa">NIS</label>
                            <input type="text" name="Nis" value="<?= $edit['Nis']; ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nm_guru">Nama Siswa</label>
                            <input type="text" name="Nm_siswa" value="<?= $edit['Nm_siswa']; ?>" id="Nm_siswa" placeholder="Nama Siswa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <input type="text" name="jenkel" value="<?= $edit['jenkel']; ?>" id="jenkel" placeholder="Jenis Kelamin" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jk">No Hp</label>
                            <input type="text" name="Hp" value="<?= $edit['Hp']; ?>" id="Hp" placeholder="No Hp" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="alamat">ID_Kelas</label>
                            <input type="text" name="Id_kelas" value="<?= $edit['Id_kelas']; ?>" id="Id_kelas" placeholder="Id_kelas" class="form-control">
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