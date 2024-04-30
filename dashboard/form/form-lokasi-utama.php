<?php
    $id = '';
    $loc = '';
    $nm_bgn = '';

    if(isset($_GET['ubah_lokasi_utama'])){
        $id = $_GET['ubah_lokasi_utama'];

        $query = "select * from lokasi_utama where id_lokasi = '$id'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $loc = $view_edit['nama_lokasi_utama'];
        $nm_bgn = $view_edit['nama_bangunan'];
    }
?>
<form class="form-container form-column" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id_lokasi" id="id_lokasi" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="id_lokasi">
            ID Lokasi
        </label>
        <?php
            $query = mysqli_query($connect, "SELECT MAX(id_lokasi) as kodeTerbesar FROM lokasi_utama");
            $data = mysqli_fetch_array($query);
            $kodeBarang = $data['kodeTerbesar'];
            $urutan = substr($kodeBarang, 3, 4);
            $urutan++;
            $word = "LOC";
            $auto_no = $word . sprintf("%04s", $urutan);
            if(isset($_GET['ubah_lokasi_utama'])){
        ?>
            <input type="text" name="id_lokasi" id="id_lokasi" value="<?php echo $id; ?>" disabled>
            <span class="info">
                Nomor ID tidak dapat di edit
            </span>
        <?php
            } else {
        ?>
            <input type="text" name="id_lokasi" id="id_lokasi" value="<?php echo $auto_no; ?>" readonly>
            <span class="info">
                Nomor ID secara otomatis akan tergenerasi
            </span>
        <?php
            }
        ?>
    </div>
    <div class="form-group">
        <label for="nama_lokasi_utama">Nama Lokasi</label>
        <input type="text" name="nama_lokasi_utama" id="nama_lokasi_utama" value="<?php echo $loc; ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_bangunan">Bangunan</label>
        <select name="nama_bangunan" id="nama_bangunan" value="<?php echo $nm_bgn; ?>" required>
            <option disabled selected>
                --- Pilih Bangunan ---
            </option>
            <?php
                $query = "select * from bangunan";
                $sql = mysqli_query($connect, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $id_bgnan = $result['id_bangunan'];
                    $nm_bgnan = $result['nama_bangunan'];
            ?>
            <?php
                if(isset($_GET['ubah_lokasi_utama']) && $nm_bgn == $nm_bgnan){
            ?>
                <option value="<?php echo $nm_bgn?>" selected>
                    <?php echo $nm_bgn?>
                </option>
            <?php
                } else {
            ?>
                <option value="<?php echo $nm_bgnan?>">
                    <?php echo $nm_bgnan?>
                </option>
            <?php
                }
            ?>
            <?php
                }
            ?>
        </select>
        <span class="info">
            Pilih salah satu guna menentukan letak Lokasi Utama
        </span>
    </div>
    <div class="button-form">
        <?php
            if(isset($_GET['ubah_lokasi_utama'])){
        ?>
            <button class="btn btn-success" name="form_process" value="edit_lokasi_utama">
                <i class="fa-solid fa-pencil"></i>
                <span>Edit Data</span>
            </button>
        <?php
            } else {
        ?>
            <button class="btn btn-success" name="form_process" value="tambah_lokasi_utama">
                <i class="fa-solid fa-circle-plus"></i>
                <span>Tambah Data</span>
            </button>
        <?php } ?>
    </div>
</form>