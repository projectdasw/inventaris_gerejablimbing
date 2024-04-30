<?php
    $id = '';
    $los = '';
    $nm_bgn = '';
    $loc = '';

    if(isset($_GET['ubah_lokasi_sekunder'])){
        $id = $_GET['ubah_lokasi_sekunder'];

        $query = "select * from lokasi_sekunder where id_lokasi_sekunder = '$id'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $los = $view_edit['nama_lokasi_sekunder'];
        $nm_bgn = $view_edit['nama_bangunan'];
        $loc = $view_edit['nama_lokasi_utama'];
    }
?>
<form class="form-container form-column" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id_lokasi_sekunder" id="id_lokasi_sekunder" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="id_lokasi_sekunder">
            ID Lokasi
        </label>
        <?php
            $query = mysqli_query($connect, "SELECT MAX(id_lokasi_sekunder) as kodeTerbesar FROM lokasi_sekunder");
            $data = mysqli_fetch_array($query);
            $kodeBarang = $data['kodeTerbesar'];
            $urutan = substr($kodeBarang, 3, 4);
            $urutan++;
            $word = "LOS";
            $auto_no = $word . sprintf("%04s", $urutan);
            if(isset($_GET['ubah_lokasi_sekunder'])){
        ?>
            <input type="text" name="id_lokasi_sekunder" id="id_lokasi_sekunder" value="<?php echo $id; ?>" disabled>
            <span class="info">
                Nomor ID tidak dapat di edit
            </span>
        <?php
            } else {
        ?>
            <input type="text" name="id_lokasi_sekunder" id="id_lokasi_sekunder" value="<?php echo $auto_no; ?>" readonly>
            <span class="info">
                Nomor ID secara otomatis akan tergenerasi
            </span>
        <?php
            }
        ?>
    </div>
    <div class="form-group">
        <label for="nama_lokasi_sekunder">Nama Lokasi</label>
        <input type="text" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder" value="<?php echo $los; ?>" required>
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
                if(isset($_GET['ubah_lokasi_sekunder']) && $nm_bgn == $nm_bgnan){
            ?>
                <option value="<?php echo $nm_bgn?>" selected>
                    <?php echo $nm_bgn?>
                </option>
            <?php
                } else {
            ?>
                <option value="<?php echo $nm_bgnan?>" required>
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
            Pilih salah satu guna menentukan letak Bangunan untuk Lokasi Sekunder
        </span>
    </div>
    <div class="form-group">
        <label for="nama_lokasi_utama">
            Lokasi Utama
        </label>
        <select name="nama_lokasi_utama" id="nama_lokasi_utama" value="<?php echo $loc; ?>" required>
            <option disabled selected>
                --- Pilih Lokasi Utama ---
            </option>
            <?php
                $query = "select * from lokasi_utama";
                $sql = mysqli_query($connect, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $id_loc = $result['id_lokasi'];
                    $nm_loc = $result['nama_lokasi_utama'];
            ?>
            <?php
                if(isset($_GET['ubah_lokasi_sekunder']) && $loc == $nm_loc){
            ?>
                <option value="<?php echo $loc?>" selected>
                    <?php echo $loc?>
                </option>
            <?php
                } else {
            ?>
                <option value="<?php echo $nm_loc?>" required>
                    <?php echo $nm_loc?>
                </option>
            <?php
                    }
                }
            ?>
        </select>
        <span class="info">
            Pilih salah satu guna menentukan letak Lokasi Utama untuk Lokasi Sekunder
        </span>
    </div>
    <div class="button-form">
        <?php
            if(isset($_GET['ubah_lokasi_sekunder'])){
        ?>
            <button class="btn btn-success" name="form_process" value="edit_lokasi_sekunder">
                <i class="fa-solid fa-pencil"></i>
                <span>Edit Data</span>
            </button>
        <?php
            } else {
        ?>
        <button class="btn btn-success" name="form_process" value="tambah_lokasi_sekunder">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Tambah Data</span>
        </button>
        <?php } ?>
    </div>
</form>