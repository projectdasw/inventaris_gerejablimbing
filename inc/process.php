<?php
    include 'connect.php';
    session_start();

    if(isset($_POST['form_process'])){
        // CREATE & EDIT BARANG GEREJA
        if($_POST['form_process'] == "tambah_baru"){
            $id = htmlspecialchars($_POST['id_barang']);
            $nm = htmlspecialchars($_POST['nama_barang']);
            $jml = htmlspecialchars($_POST['jumlah']);
            $knd = htmlspecialchars($_POST['kondisi']);
            $ket_knd = htmlspecialchars($_POST['keterangan_kondisi']);
            $nm_bgn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);

            $query = "insert into barang_gereja
                        values('$id', '$nm', '$jml', '$knd', '$ket_knd', '$nm_bgn', '$loc', '$los')";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-tambah-barang-baru'] = true;
                header('location: ../dashboard/index.php?list-data=list-data.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "edit_barang"){
            $id = htmlspecialchars($_POST['id_barang']);
            $nm = htmlspecialchars($_POST['nama_barang']);
            $jml = htmlspecialchars($_POST['jumlah']);
            $knd = htmlspecialchars($_POST['kondisi']);
            $ket_knd = htmlspecialchars($_POST['keterangan_kondisi']);
            $nm_bgn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);

            $query = "update barang_gereja set nama_barang='$nm', jumlah='$jml', kondisi='$knd',
                        keterangan_kondisi='$ket_knd', nama_bangunan='$nm_bgn', nama_lokasi_utama='$loc',
                        nama_lokasi_sekunder='$los' where id_barang='$id'";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-edit-barang-baru'] = true;
                header('location: ../dashboard/index.php?list-data=list-data.php');
            }
            else{
                echo $query;
            }
        }
        // CREATE & EDIT BARANG GEREJA

        // CREATE & EDIT BANGUNAN
        else if($_POST['form_process'] == "tambah_bangunan"){
            $id = htmlspecialchars($_POST['id_bangunan']);
            $nm = htmlspecialchars($_POST['nama_bangunan']);
            $ft = htmlspecialchars($_POST['foto_bangunan']);
            // UNTUK FOTO TIDAK DIGARAP SEMENTARA INI

            $query = "insert into bangunan values('$id', '$nm', '$ft')";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-tambah-bangunan'] = true;
                header('location: ../dashboard/index.php?bangunan=bangunan.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "edit_bangunan"){
            $id = htmlspecialchars($_POST['id_bangunan']);
            $nm = htmlspecialchars($_POST['nama_bangunan']);
            $ft = htmlspecialchars($_POST['foto_bangunan']);
            // UNTUK FOTO TIDAK DIGARAP SEMENTARA INI

            $query = "update bangunan set nama_bangunan='$nm', foto_bangunan='$ft'
                        where id_bangunan='$id'";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-edit-bangunan'] = true;
                header('location: ../dashboard/index.php?bangunan=bangunan.php');
            }
            else{
                echo $query;
            }
        }
        // END OF CREATE & EDIT BANGUNAN

        // CREATE & EDIT LOKASI UTAMA
        else if($_POST['form_process'] == "tambah_lokasi_utama"){
            $id = htmlspecialchars($_POST['id_lokasi']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $nm_bngn = htmlspecialchars($_POST['nama_bangunan']);

            $query = "insert into lokasi_utama values('$id', '$loc', '$nm_bngn')";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-tambah-lokasi-utama'] = true;
                header('location: ../dashboard/index.php?lokasi-utama=lokasi-utama.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "edit_lokasi_utama"){
            $id = htmlspecialchars($_POST['id_lokasi']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $nm_bngn = htmlspecialchars($_POST['nama_bangunan']);

            $query = "update lokasi_utama set nama_lokasi_utama='$loc', nama_bangunan='$nm_bngn'
                        where id_lokasi='$id'";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-edit-lokasi-utama'] = true;
                header('location: ../dashboard/index.php?lokasi-utama=lokasi-utama.php');
            }
            else{
                echo $query;
            }
        }
        // END OF CREATE & EDIT LOKASI UTAMA

        // CREATE & EDIT LOKASI SEKUNDER
        else if($_POST['form_process'] == "tambah_lokasi_sekunder"){
            $id = htmlspecialchars($_POST['id_lokasi_sekunder']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);
            $nm_bngn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);

            $query = "insert into lokasi_sekunder values('$id', '$los', '$nm_bngn', '$loc')";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-tambah-lokasi-sekunder'] = true;
                header('location: ../dashboard/index.php?lokasi-sekunder=lokasi-sekunder.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "edit_lokasi_sekunder"){
            $id = htmlspecialchars($_POST['id_lokasi_sekunder']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);
            $nm_bngn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);

            $query = "update lokasi_sekunder set nama_lokasi_sekunder='$los', nama_bangunan='$nm_bngn',
                        nama_lokasi_utama='$loc' where id_lokasi_sekunder='$id'";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-edit-lokasi-sekunder'] = true;
                header('location: ../dashboard/index.php?lokasi-sekunder=lokasi-sekunder.php');
            }
            else{
                echo $query;
            }
        }
        // CREATE & EDIT LOKASI SEKUNDER

        // CREATE & EDIT AKUN
        else if($_POST['form_process'] == "tambah_akun"){
            $id = htmlspecialchars($_POST['id_akun']);
            $nm = htmlspecialchars($_POST['nama_akun']);
            $user = htmlspecialchars($_POST['username']);
            $pass = htmlspecialchars($_POST['password']);
            $lvl = htmlspecialchars($_POST['level_akun']);
            $no_hp = htmlspecialchars($_POST['no_hp']);

            $query = "insert into akun values('$id', '$nm', '$user', '$pass', '$lvl', '$no_hp')";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-tambah-akun'] = true;
                header('location: ../dashboard/index.php?akun=akun.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "edit_akun"){
            $id = htmlspecialchars($_POST['id_akun']);
            $nm = htmlspecialchars($_POST['nama_akun']);
            $user = htmlspecialchars($_POST['username']);
            $pass = htmlspecialchars($_POST['password']);
            $lvl = htmlspecialchars($_POST['level_akun']);
            $no_hp = htmlspecialchars($_POST['no_hp']);

            $query = "update akun set nama_akun='$nm', username='$user', password='$pass',
                        level_akun='$lvl', no_hp='$no_hp' where id_akun='$id'";
            $sql = mysqli_query($connect, $query);
            if($sql){
                $_SESSION['sukses-edit-akun'] = true;
                header('location: ../dashboard/index.php?akun=akun.php');
            }
            else{
                echo $query;
            }
        }
        // CREATE & EDIT AKUN
    }

    // DELETE BARANG GEREJA
    if(isset($_GET['hapus_barang_gereja'])){
        $id = $_GET['hapus_barang_gereja'];

        $query = "delete from barang_gereja where id_barang='$id'";
        $sql = mysqli_query($connect, $query);

        if($sql){
            $_SESSION['sukses-hapus-barang-baru'] = true;
            header('location: ../dashboard/index.php?list-data=list-data.php');
        }
        else{
            echo $query;
        }
    }
    // END OF DELETE BARANG GEREJA
    
    // DELETE BANGUNAN
    if(isset($_GET['hapus_bangunan'])){
        $id = $_GET['hapus_bangunan'];

        $query = "delete from bangunan where id_bangunan='$id'";
        $sql = mysqli_query($connect, $query);

        if($sql){
            $_SESSION['sukses-hapus-bangunan'] = true;
            header('location: ../dashboard/index.php?bangunan=bangunan.php');
        }
        else{
            echo $query;
        }
    }
    // END OF DELETE BANGUNAN

    // DELETE LOKASI UTAMA
    if(isset($_GET['hapus_lokasi_utama'])){
        $id = $_GET['hapus_lokasi_utama'];

        $query = "delete from lokasi_utama where id_lokasi='$id'";
        $sql = mysqli_query($connect, $query);

        if($sql){
            $_SESSION['sukses-hapus-lokasi-utama'] = true;
            header('location: ../dashboard/index.php?lokasi-utama=lokasi-utama.php');
        }
        else{
            echo $query;
        }
    }
    // END OF DELETE LOKASI UTAMA

    // DELETE LOKASI SEKUNDER
    if(isset($_GET['hapus_lokasi_sekunder'])){
        $id = $_GET['hapus_lokasi_sekunder'];

        $query = "delete from lokasi_sekunder where id_lokasi_sekunder='$id'";
        $sql = mysqli_query($connect, $query);

        if($sql){
            $_SESSION['sukses-hapus-lokasi-sekunder'] = true;
            header('location: ../dashboard/index.php?lokasi-sekunder=lokasi-sekunder.php');
        }
        else{
            echo $query;
        }
    }
    // END OF DELETE LOKASI SEKUNDER

    // DELETE AKUN
    if(isset($_GET['hapus_akun'])){
        $id = $_GET['hapus_akun'];

        $query = "delete from akun where id_akun='$id'";
        $sql = mysqli_query($connect, $query);

        if($sql){
            $_SESSION['sukses-hapus-akun'] = true;
            header('location: ../dashboard/index.php?akun=akun.php');
        }
        else{
            echo $query;
        }
    }
    // END OF DELETE AKUN
?>