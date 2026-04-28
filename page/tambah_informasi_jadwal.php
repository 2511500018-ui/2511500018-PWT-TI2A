<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Informasi Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi,"select max(kd_jadwal) from jadwal") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

if($datakode[0]){
    $kode = (int)$datakode[0] + 1;
    $kode = $kode + 1;
} else {
    $hasilkode = "1";
}
$_SESSION['KODE'] = $hasilkode;
if(isset($_POST['tambah'])){
    $kd_jadwal = $_POST['kd_jadwal'];
    $id_kelas = $_POST['id_kelas'];
    $Thn_ajaran = $_POST['Thn_ajaran'];
    $Semester = $_POST['Semester'];
    $insert = mysqli_query($koneksi,"INSERT INTO jadwal values ('$kd_jadwal','$id_kelas','$Thn_ajaran','$Semester')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal">';
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
                        
                        <div class="form-group">
                            <label for="kd_siswa">Kode Jadwal</label>
                            <input type="text" name="kd_jadwal" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nm_siswa">Id Kelas</label>
                            <input type="text" name="id_kelas" id="id_kelas" placeholder="id_kelas" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Thn_ajaran">Tahun Ajaran</label>
                            <input type="text" name="Thn_ajaran" id="Thn_ajaran" placeholder="Tahun Ajaran" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Semester">Semester</label>
                            <input type="text" name="Semester" id="Semester" placeholder="Semester" class="form-control">
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
