<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    include 'connect.php';
    session_start();

    if(isset($_POST['form_process'])){
        // LOGIN PROCESS
        if($_POST['form_process'] == "login"){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query_log = "select * from akun where username='$username' and password='$password'";
            $sql_log = mysqli_query($connect, $query_log);
            $cek = mysqli_num_rows($sql_log);
            $data = mysqli_fetch_array($sql_log);
            $name = $data['username'];
            $type = $data['level_akun'];

            if($cek == true){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['level_akun'] = $type;
                $_SESSION['logged_in'] = true;

                // CATATAN TRACK RECORD
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $aktivitas = "<strong>$username</strong> telah melakukan aktivitas
                            <strong>Login</strong> pada hari $tgl pukul $jam";

                // INSERT TRACK RECORD AKTIVITAS
                $query_akt = "insert into aktivitas
                    values(no, '$tgl_akt', '$username', '$aktivitas')";
                $sql_akt = mysqli_query($connect, $query_akt);
                
                header("location: ../dashboard/");
            }
            else{
                $_SESSION['invalid-acc'] = true;
                header("location: ../");
            }
        }
        else if($_POST['form_process'] == "logout"){
            session_start();
            $nama_user = $_SESSION['username'];

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        <strong>Logout</strong> pada hari $tgl pukul $jam";

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);
            
            session_unset();
            header("location: ../");
            session_destroy();
            exit();
        }
        // END OF LOGIN PROCESS

        // CREATE & EDIT BARANG GEREJA
        else if($_POST['form_process'] == "tambah_baru"){
            $id = htmlspecialchars($_POST['id_barang']);
            $nm = htmlspecialchars($_POST['nama_barang']);
            $jml = htmlspecialchars($_POST['jumlah']);
            $knd = htmlspecialchars($_POST['kondisi']);
            $ket_knd = htmlspecialchars($_POST['keterangan_kondisi']);
            $nm_bgn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Tambah Barang Gereja Baru bernama <strong>$nm</strong>
                        pada hari $tgl pukul $jam";

            // INSERT TAMBAH BARANG BARU
            $query = "insert into barang_gereja
                        values('$id', '$nm', '$jml', '$knd', '$ket_knd', '$nm_bgn', '$loc', '$los')";
            $sql = mysqli_query($connect, $query);

            // INSERT DETAIL BARANG BARU
            $query_new = "insert into detail_barang_baru
                        values(no, '$id', '$nm', '$nm_bgn', '$loc', '$los', '$jml', 'Barang Baru')";
            $sql_new = mysqli_query($connect, $query_new);

            // INSERT TRANSAKSI
            $query_trans = "insert into trans_harta_benda
                        values(no, '$tgl_akt', '$id', '$nm', '$jml', '$ket_knd', 'Barang Baru',
                        '$nm_bgn', '$loc', '$los')";
            $sql_trans = mysqli_query($connect, $query_trans);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

            if($sql){
                $_SESSION['sukses-tambah-barang-baru'] = true;
                header('location: ../dashboard/index.php?list-data=list-data.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "tambah_jumlah"){
            $id = htmlspecialchars($_POST['id_barang']);
            $nm = htmlspecialchars($_POST['nama_barang']);
            $jml = htmlspecialchars($_POST['jumlah']);
            $desc = htmlspecialchars($_POST['deskripsi']);
            $nm_bgn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Penambahan barang Gereja bernama <strong>$nm</strong>
                        pada hari $tgl pukul $jam";

            // INSERT DETAIL
            $query_detail = "insert into detail_tambah_jumlah
                        values(no, '$id', '$nm', '$nm_bgn', '$loc', '$los', '$jml', '$desc')";
            $sql_detail = mysqli_query($connect, $query_detail);

            // INSERT TRANSAKSI
            $query_trans = "insert into trans_harta_benda
                        values(no, '$tgl_akt', '$id', '$nm', '$jml', '$desc', 'Penambahan Jumlah Barang',
                        '$nm_bgn', '$loc', '$los')";
            $sql_trans = mysqli_query($connect, $query_trans);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

            if($sql_detail){
                $_SESSION['sukses-tambah-barang-ada'] = true;
                header('location: ../dashboard/index.php?list-data=list-data.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "kurangi_jumlah"){
            $id = htmlspecialchars($_POST['id_barang']);
            $nm = htmlspecialchars($_POST['nama_barang']);
            $jml = htmlspecialchars($_POST['jumlah']);
            $desc = htmlspecialchars($_POST['deskripsi']);
            $nm_bgn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Pengurangan barang Gereja bernama <strong>$nm</strong>
                        pada hari $tgl pukul $jam";

            // INSERT DETAIL
            $query_detail = "insert into detail_kurang_jumlah
                        values(no, '$id', '$nm', '$nm_bgn', '$loc', '$los', '$jml', '$desc')";
            $sql_detail = mysqli_query($connect, $query_detail);

            // INSERT TRANSAKSI
            $query_trans = "insert into trans_harta_benda
                        values(no, '$tgl_akt', '$id', '$nm', '$jml', '$desc', 'Pengurangan Jumlah Barang',
                        '$nm_bgn', '$loc', '$los')";
            $sql_trans = mysqli_query($connect, $query_trans);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

            if($sql_trans){
                $_SESSION['sukses-kurangi-barang'] = true;
                header('location: ../dashboard/index.php?list-data=list-data.php');
            }
            else{
                echo $query;
            }
        }
        else if($_POST['form_process'] == "tambah_barang"){
            $id = htmlspecialchars($_POST['id_barang']);
            $nm = htmlspecialchars($_POST['nama_barang']);
            $jml = htmlspecialchars($_POST['jumlah']);
            $knd = htmlspecialchars($_POST['kondisi']);
            $ket_knd = htmlspecialchars($_POST['keterangan_kondisi']);
            $nm_bgn = htmlspecialchars($_POST['nama_bangunan']);
            $loc = htmlspecialchars($_POST['nama_lokasi_utama']);
            $los = htmlspecialchars($_POST['nama_lokasi_sekunder']);

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Tambah Barang Gereja Baru bernama <strong>$nm</strong>
                        pada hari $tgl pukul $jam";

            // INSERT TAMBAH BARANG BARU
            $query = "insert into barang_gereja
                        values('$id', '$nm', '$jml', '$knd', '$ket_knd', '$nm_bgn', '$loc', '$los')";
            $sql = mysqli_query($connect, $query);

            // INSERT TRANSAKSI
            $query_trans = "insert into trans_harta_benda
                        values(no, '$tgl_akt', '$id', '$nm', '$jml', '$ket_knd', 'Barang Baru',
                        '$nm_bgn', '$loc', '$los')";
            $sql_trans = mysqli_query($connect, $query_trans);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Edit Barang Gereja <strong>$nm</strong>
                        pada hari $tgl pukul $jam";

            // UPDATE DATA BARANG
            $query = "update barang_gereja set nama_barang='$nm', jumlah='$jml', kondisi='$knd',
                        keterangan_kondisi='$ket_knd', nama_bangunan='$nm_bgn', nama_lokasi_utama='$loc',
                        nama_lokasi_sekunder='$los' where id_barang='$id'";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

            if($sql){
                $_SESSION['sukses-edit-barang'] = true;
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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Tambah Bangunan Baru bernama <strong>$nm</strong>
                        pada hari $tgl pukul $jam";
            
            // INSERT BANGUNAN BARU
            $query = "insert into bangunan values('$id', '$nm')";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Edit Bangunan <strong>$nm</strong>
                        pada hari $tgl pukul $jam";

            // UPDATE BANGUNAN
            $query = "update bangunan set nama_bangunan='$nm' where id_bangunan='$id'";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Tambah Lokasi Utama Baru bernama <strong>$loc</strong>
                        pada hari $tgl pukul $jam";

            // INSERT LOKASI UTAMA BARU
            $query = "insert into lokasi_utama values('$id', '$loc', '$nm_bngn')";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Edit Lokasi Utama <strong>$loc</strong>
                        pada hari $tgl pukul $jam";

            // UPDATE LOKASI UTAMA
            $query = "update lokasi_utama set nama_lokasi_utama='$loc', nama_bangunan='$nm_bngn'
                        where id_lokasi='$id'";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Tambah Lokasi Sekunder baru bernama <strong>$los</strong>
                        pada hari $tgl pukul $jam";

            // INSERT LOKASI SEKUNDER
            $query = "insert into lokasi_sekunder values('$id', '$los', '$nm_bngn', '$loc')";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Edit Lokasi Sekunder <strong>$los</strong>
                        pada hari $tgl pukul $jam";

            // UPDATE LOKASI SEKUNDER
            $query = "update lokasi_sekunder set nama_lokasi_sekunder='$los', nama_bangunan='$nm_bngn',
                        nama_lokasi_utama='$loc' where id_lokasi_sekunder='$id'";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            // $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Tambah Akun Baru bernama <strong>$nm</strong> dengan nama username
                        <strong>$user</strong> berstatus <strong>$lvl</strong>
                        pada hari $tgl pukul $jam";

            // INSERT AKUN
            $query = "insert into akun values('$id', '$nm', '$user', '$pass', '$lvl', '$no_hp')";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

            // CATATAN TRACK RECORD
            $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
            $tgl = strftime("%A, %d %B %Y");
            $jam = date('H:i:s');
            $nama_user = $_SESSION['username'];
            $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                        Edit Akun bernama <strong>$nm</strong> dengan nama username
                        <strong>$user</strong> berstatus <strong>$lvl</strong>
                        pada hari $tgl pukul $jam";

            // UPDATE AKUN
            $query = "update akun set nama_akun='$nm', username='$user', password='$pass',
                        level_akun='$lvl', no_hp='$no_hp' where id_akun='$id'";
            $sql = mysqli_query($connect, $query);

            // INSERT TRACK RECORD AKTIVITAS
            $query_akt = "insert into aktivitas
                values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
            $sql_akt = mysqli_query($connect, $query_akt);

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

        // CATATAN TRACK RECORD
        $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
        $tgl = strftime("%A, %d %B %Y");
        $jam = date('H:i:s');
        $nama_user = $_SESSION['username'];
        $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                    Hapus Barang Gereja dengan ID <strong>$id</strong>
                    pada hari $tgl pukul $jam";

        // INSERT TRACK RECORD AKTIVITAS
        $query_akt = "insert into aktivitas
            values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
        $sql_akt = mysqli_query($connect, $query_akt);

        // DELETE BARANG GEREJA
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

        // CATATAN TRACK RECORD
        $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
        $tgl = strftime("%A, %d %B %Y");
        $jam = date('H:i:s');
        $nama_user = $_SESSION['username'];
        $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                    Hapus Bangunan dengan ID <strong>$id</strong>
                    pada hari $tgl pukul $jam";
        
        // DELETE BANGUNAN
        $query = "delete from bangunan where id_bangunan='$id'";
        $sql = mysqli_query($connect, $query);

        // INSERT TRACK RECORD AKTIVITAS
        $query_akt = "insert into aktivitas
            values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
        $sql_akt = mysqli_query($connect, $query_akt);

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

        // CATATAN TRACK RECORD
        $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
        $tgl = strftime("%A, %d %B %Y");
        $jam = date('H:i:s');
        $nama_user = $_SESSION['username'];
        $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                    Hapus Lokasi Utama dengan ID <strong>$id</strong>
                    pada hari $tgl pukul $jam";

        // DELETE LOKASI UTAMA
        $query = "delete from lokasi_utama where id_lokasi='$id'";
        $sql = mysqli_query($connect, $query);

        // INSERT TRACK RECORD AKTIVITAS
        $query_akt = "insert into aktivitas
            values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
        $sql_akt = mysqli_query($connect, $query_akt);

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

        // CATATAN TRACK RECORD
        $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
        $tgl = strftime("%A, %d %B %Y");
        $jam = date('H:i:s');
        $nama_user = $_SESSION['username'];
        $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                    Hapus Lokasi Sekunder dengan ID <strong>$id</strong>
                    pada hari $tgl pukul $jam";

        // DELETE LOKASI SEKUNDER
        $query = "delete from lokasi_sekunder where id_lokasi_sekunder='$id'";
        $sql = mysqli_query($connect, $query);

        // INSERT TRACK RECORD AKTIVITAS
        $query_akt = "insert into aktivitas
            values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
        $sql_akt = mysqli_query($connect, $query_akt);

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

        // CATATAN TRACK RECORD
        $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
        $tgl = strftime("%A, %d %B %Y");
        $jam = date('H:i:s');
        $nama_user = $_SESSION['username'];
        $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                    Hapus Akun Gereja dengan ID <strong>$id</strong>
                    pada hari $tgl pukul $jam";

        // DELETE AKUN
        $query = "delete from akun where id_akun='$id'";
        $sql = mysqli_query($connect, $query);

        // INSERT TRACK RECORD AKTIVITAS
        $query_akt = "insert into aktivitas
            values(no, '$tgl_akt', '$nama_user', '$aktivitas')";
        $sql_akt = mysqli_query($connect, $query_akt);

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