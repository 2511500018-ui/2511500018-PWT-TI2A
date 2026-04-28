<div class="contetnt-header">
    <div class="container-fluid">

</div>
</div>

<?php
if(isset($_POST['tambah'])){
    $pl = $_POST['pl']; 
    $pb = $_POST['pb']; 
    $cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_users WHERE Username = '$Username' "));

    if($cek){
        $update = mysqli_query($koneksi, "UPDATE user SET password = '$pb' WHERE password = '$$pl' AND Username = 'Username' ");
        if($update){
            echo "berhasil cuyyy";
        }
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
                            <label for="Username">Username</label>
                            <input type="text" name="Username" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="Password">password lama</label>
                            <input type="text" name="Password" value="<?php echo $_SESSION['Username'];?>" class="form-control" placeholder="Password Lama">
                        </div>

                        <div class="form-group">
                            <label for="pb">Password baru</label>
                            <input type="text" name="pb" placeholder="Password baru" class="form-control">
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