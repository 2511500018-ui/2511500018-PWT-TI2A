<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Informasi Guru</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi,"select max(kd_guru) from guru") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

if($datakode){
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "D-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "M-";
}
$_SESSION['KODE'] = $hasilkode;
if(isset($_POST['tambah'])){
    $kd_guru = $_POST['kd_guru'];
    $nm_guru = $_POST['nm_guru'];
    $Jenkel = $_POST['Jenkel'];
    $Pend_terakhir = $_POST['Pend_terakhir'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];
    $insert = mysqli_query($koneksi,"INSERT INTO guru values ('$kd_guru','$nm_guru', '$alamat', '$Jenkel', '$Pend_terakhir', '$hp')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=guru">';
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
                            <label for="kd_guru">Kode Guru</label>
                            <input type="text" name="kd_guru" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nm_guru">Nama Guru</label>
                            <input type="text" name="nm_guru" id="nm_guru" placeholder="Nama Guru" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Jenkel">Jenis Kelamin</label>
                            <input type="text" name="Jenkel" id="Jenkel" placeholder="Jenis Kelamin" class="form-control">
                        </div> 

                        <div class="form-group">
                            <label for="Pend_terakhir">Pendidikan Terakhir</label>
                            <input type="text" name="Pend_terakhir" id="Pend_terakhir" placeholder="Pendidikan Terakhir" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="hp">No Hp</label>
                            <input type="text" name="hp" id="Hp" placeholder="hp" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat Guru" class="form-control">
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
