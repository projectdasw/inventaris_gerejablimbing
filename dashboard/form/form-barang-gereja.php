<?php
    $id = '';
    $nm = '';
    $jml = '';
    $knd = '';
    $ket_knd = '';
    $nm_bgn = '';
    $loc = '';
    $los = '';

    if(isset($_GET['ubah_barang_gereja1'])){
        $id = $_GET['ubah_barang_gereja1'];

        $query = "select * from barang_gereja where id_barang = '$id'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm = $view_edit['nama_barang'];
        $jml = $view_edit['jumlah'];
        $knd = $view_edit['kondisi'];
        $ket_knd = $view_edit['keterangan_kondisi'];
        $nm_bgn = $view_edit['nama_bangunan'];
        $loc = $view_edit['nama_lokasi_utama'];
        $los = $view_edit['nama_lokasi_sekunder'];
    }
?>
<form class="form-container form-column" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="id_barang">ID Barang</label>
        <?php
            $word = "IHB-";
            $number = random_int(00000, 99999);
            $auto_no = $word . sprintf("%05s", $number);
            if(isset($_GET['ubah_barang_gereja1'])){
        ?>
            <input type="text" name="id_barang" id="id_barang" value="<?php echo $id; ?>" disabled>
            <span class="info">
                Nomor ID tidak dapat di edit
            </span>
        <?php
            } else {
        ?>
            <input type="text" name="id_barang" id="id_barang" value="<?php echo $auto_no; ?>" readonly>
            <span class="info">
                Nomor ID secara otomatis akan tergenerasi
            </span>
        <?php
            }
        ?>
    </div>
    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang" value="<?php echo $nm; ?>" required>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah Barang</label>
        <?php
            if(isset($_GET['ubah_barang_gereja1'])){
        ?>
            <input type="number" name="jumlah" id="jumlah" value="<?php echo $jml; ?>">
        <?php
            } else {
        ?>
            <input type="number" name="jumlah" id="jumlah" required>
        <?php } ?>
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
                if(isset($_GET['ubah_barang_gereja1']) && $nm_bgn == $nm_bgnan){
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
            }
            ?>
        </select>
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
                if(isset($_GET['ubah_barang_gereja1']) && $loc == $nm_loc){
            ?>
                <option value="<?php echo $loc?>" selected>
                    <?php echo $loc?>
                </option>
            <?php
                } else {
            ?>
                <option value="<?php echo $nm_loc?>">
                    <?php echo $nm_loc?>
                </option>
            <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nama_lokasi_sekunder">
            Lokasi Sekunder
        </label>
        <select name="nama_lokasi_sekunder" id="nama_lokasi_sekunder" value="<?php echo $los; ?>">
            <option disabled selected>
                --- Pilih Lokasi Sekunder ---
            </option>
            <?php
                $query = "select * from lokasi_sekunder";
                $sql = mysqli_query($connect, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $id_los = $result['id_lokasi_sekunder'];
                    $nm_los = $result['nama_lokasi_sekunder'];
            ?>
            <?php
                if(isset($_GET['ubah_barang_gereja1']) && $los == $nm_los){
            ?>
                <option value="<?php echo $los?>" selected>
                    <?php echo $los?>
                </option>
            <?php
                } else {
            ?>
                <option value="<?php echo $nm_los?>">
                    <?php echo $nm_los?>
                </option>
            <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="kondisi">
            Kondisi Barang
        </label>
        <textarea name="kondisi" id="kondisi"
            cols="53" rows="4"><?php echo $knd; ?></textarea>
    </div>
    <div class="form-group">
        <label for="keterangan_kondisi">
            Keterangan Barang
        </label>
        <textarea name="keterangan_kondisi" id="keterangan_kondisi"
            cols="53" rows="4"><?php echo $ket_knd; ?></textarea>
    </div>
    <div class="button-form">
    <?php
            if(isset($_GET['ubah_barang_gereja1'])){
        ?>
            <button class="btn btn-success" name="form_process" value="edit_barang">
                <i class="fa-solid fa-pencil"></i>
                <span>Edit Data</span>
            </button>
        <?php
            } else {
        ?>
        <button class="btn btn-success" name="form_process" value="tambah_baru">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Tambah Data</span>
        </button>
        <?php
            }
        ?>
    </div>
</form>