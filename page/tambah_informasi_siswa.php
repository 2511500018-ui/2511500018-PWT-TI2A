<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Informasi Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi,"SELECT MAX(RIGHT(Nis,3)) as kode FROM siswa") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);

if($datakode && $datakode['kode']){
    $kode = (int)$datakode['kode'] + 1;
    $hasilkode = "B-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "B-001";

}
$_SESSION['KODE'] = $hasilkode;
if(isset($_POST['tambah'])){
    $Nis = $_POST['Nis'];
    $Nm_siswa = $_POST['Nm_siswa'];
    $jenkel = $_POST['jenkel'];
    $Hp = $_POST['Hp'];
    $Id_kelas = $_POST['Id_kelas'];
   $insert = mysqli_query($koneksi,"INSERT INTO siswa (Nis, Nm_siswa, jenkel, Hp, Id_kelas) VALUES ('$Nis','$Nm_siswa','$jenkel','$Hp','$Id_kelas')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
    } else {
        echo "Error: " . mysqli_error($koneksi);

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
                        
                        <div class="form-group">
                            <label for="kd_siswa">NIS</label>
                            <input type="text" name="Nis" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nm_siswa">Nama Siswa</label>
                            <input type="text" name="Nm_siswa" id="Nm_siswa" placeholder="Nama Siswa" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <input type="text" name="jenkel" id="jenkel" placeholder="Jenis Kelamin" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jk">No Hp</label>
                            <input type="text" name="Hp" id="Hp" placeholder="No Hp" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Id Kelas</label>
                            <input type="text" name="Id_kelas" id="Id_kelas" placeholder="Id kelas" class="form-control">
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
