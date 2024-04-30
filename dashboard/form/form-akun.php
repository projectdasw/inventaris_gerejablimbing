<?php
    $id = '';
    $nm = '';
    $user = '';
    $pass = '';
    $lvl = '';
    $no_hp = '';

    if(isset($_GET['ubah_akun'])){
        $id = $_GET['ubah_akun'];

        $query = "select * from akun where id_akun = '$id'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm = $view_edit['nama_akun'];
        $user = $view_edit['username'];
        $pass = $view_edit['password'];
        $lvl = $view_edit['level_akun'];
        $no_hp = $view_edit['no_hp'];
    }
?>
<form class="form-container form-column" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id_akun" id="id_akun" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="id_akun">ID Akun</label>
        <?php
            $word = "AIG-";
            $number = random_int(00000, 99999);
            $auto_no = $word . sprintf("%05s", $number);
            if(isset($_GET['ubah_akun'])){
        ?>
            <input type="text" name="id_akun" id="id_akun" value="<?php echo $id; ?>" disabled>
            <span class="info">
                Nomor ID tidak dapat di edit
            </span>
        <?php
            } else {
        ?>
            <input type="text" name="id_akun" id="id_akun" value="<?php echo $auto_no; ?>" readonly>
            <span class="info">
                Nomor ID secara otomatis akan tergenerasi
            </span>
        <?php
            }
        ?>
    </div>
    <div class="form-group">
        <label for="nama_akun">Nama Akun</label>
        <input type="text" name="nama_akun" id="nama_akun" value="<?php echo $nm?>" required>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $user?>" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" value="<?php echo $pass?>" required>
    </div>
    <div class="form-group">
        <label for="level_akun">Level Akun</label>
        <input type="text" name="level_akun" id="level_akun" value="<?php echo $lvl?>">
    </div>
    <div class="form-group">
        <label for="no_hp">No. HP / WhatsApp</label>
        <input type="text" name="no_hp" id="no_hp" pattern="8[0-9]*" value="<?php echo $no_hp?>" required>
        <span class="info">
            Nomor Hp digunakan untuk OTP pada saat Login akun
        </span>
    </div>
    <div class="button-form">
    <?php
            if(isset($_GET['ubah_akun'])){
        ?>
            <button class="btn btn-success" name="form_process" value="edit_akun">
                <i class="fa-solid fa-pencil"></i>
                <span>Edit Data</span>
            </button>
        <?php
            } else {
        ?>
            <button class="btn btn-success" name="form_process" value="tambah_akun">
                <i class="fa-solid fa-circle-plus"></i>
                <span>Tambah Data</span>
            </button>
        <?php
            }
        ?>
    </div>
</form> 