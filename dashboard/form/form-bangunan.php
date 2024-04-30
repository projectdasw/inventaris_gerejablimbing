<?php
    $id = '';
    $nm = '';
    $ft = '';

    if(isset($_GET['ubah_bangunan'])){
        $id = $_GET['ubah_bangunan'];

        $query = "select * from bangunan where id_bangunan = '$id'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm = $view_edit['nama_bangunan'];
        $ft = $view_edit['foto_bangunan'];
    }
?>
<form class="form-container form-column" id="form-bangunan" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id_bangunan" id="id_bangunan" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="id_bangunan">ID Bangunan</label>
        <?php
            $query = mysqli_query($connect, "SELECT MAX(id_bangunan) as kodeTerbesar FROM bangunan");
            $data = mysqli_fetch_array($query);
            $kodeBarang = $data['kodeTerbesar'];
            $urutan = substr($kodeBarang, 3, 4);
            $urutan++;
            $word = "HBP";
            $auto_no = $word . sprintf("%04s", $urutan);
            if(isset($_GET['ubah_bangunan'])){
        ?>
            <input type="text" name="id_bangunan" id="id_bangunan" value="<?php echo $id; ?>" disabled>
            <span class="info">
                Nomor ID tidak dapat di edit
            </span>
        <?php
            } else {
        ?>
            <input type="text" name="id_bangunan" id="id_bangunan" value="<?php echo $auto_no; ?>" readonly>
            <span class="info">
                Nomor ID secara otomatis akan tergenerasi
            </span>
        <?php
            }
        ?>
    </div>
    <div class="form-group">
        <label for="nama_bangunan">Nama Bangunan</label>
        <input type="text" name="nama_bangunan" id="nama_bangunan" value="<?php echo $nm; ?>" required>
    </div>
    <div class="form-group upload-file">
        <label for="foto_bangunan">
            Foto Bangunan
        </label>
        <input type="file" name="" id="" disabled>
        <span class="danger">
            Fitur Upload Foto belum dapat digunakan
        </span>
    </div>
    <div class="button-form">
        <?php
            if(isset($_GET['ubah_bangunan'])){
        ?>
            <button class="btn btn-success" name="form_process" value="edit_bangunan">
                <i class="fa-solid fa-pencil"></i>
                <span>Edit Data</span>
            </button>
        <?php
            } else {
        ?>
            <button class="btn btn-success" id="bangunan-valid" name="form_process" value="tambah_bangunan">
                <i class="fa-solid fa-circle-plus"></i>
                <span>Tambah Data</span>
            </button>
        <?php
            }
        ?>
    </div>
</form>