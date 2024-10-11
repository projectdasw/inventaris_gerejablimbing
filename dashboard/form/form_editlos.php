<?php
    $id_los = '';
    $nm_los = '';
    $nm_loc = '';
    $nm_bgn = '';

    if(isset($_GET['ubah_lokasisekunder'])){
        $id_los = $_GET['ubah_lokasisekunder'];

        $query = "select * from lokasi_sekunder where id_lokasi_sekunder = '$id_los'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm_los = $view_edit['nama_lokasi_sekunder'];
        $nm_loc = $view_edit['nama_lokasi_utama'];
        $nm_bgn = $view_edit['nama_bangunan'];
    }
?>
<form class="needs-validation" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off" novalidate>
    <input type="hidden" name="id_lokasi_sekunder" id="id_lokasi_sekunder" value="<?php echo $id_los; ?>">
    <div class="row">
        <div class="col mb-3">
            <label for="id_lokasi_sekunder" class="form-label">ID Lokasi</label>
            <input type="text" class="form-control" name="id_lokasi_sekunder" id="id_lokasi_sekunder"
                value="<?php echo $id_los; ?>" readonly>
            <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                Nomor ID tidak bisa di edit
            </span>
        </div>
        <div class="col mb-3">
            <label for="nama_lokasi_sekunder" class="form-label">Nama Lokasi</label>
            <input type="text" class="form-control" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder"
                value="<?php echo $nm_los; ?>" required>
            <div class="valid-feedback">
                Nama Lokasi telah terisi
            </div>
            <div class="invalid-feedback">
                Nama Lokasi tidak boleh kosong
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col mb-3">
            <label for="nama_bangunan" class="form-label">Bangunan</label>
            <select class="form-select" name="nama_bangunan" id="nama_bangunan2_select"
                data-placeholder="--- Pilih Bangunan ---">
                <option></option>
                <?php
                    $query = "select * from bangunan";
                    $sql = mysqli_query($connect, $query);

                    while($result = mysqli_fetch_assoc($sql)){
                        $id_bgn = $result['id_bangunan'];
                        $loc_bgn = $result['nama_bangunan'];
                ?>
                    <?php
                    if($loc_bgn == $nm_bgn){
                    ?>
                        <option value="<?php echo $nm_bgn?>" selected>
                            <?php echo $nm_bgn?>
                        </option>
                <?php
                    } else {
                ?>
                    <option value="<?php echo $loc_bgn?>">
                        <?php echo $loc_bgn?>
                    </option>
                <?php
                    }
                }
                ?>
            </select>
            <div class="valid-feedback">
                Kategori Bangunan telah dipilih
            </div>
            <div class="invalid-feedback">
                Harap pilih untuk kategori Bangunan
            </div>
        </div>
        <div class="col mb-3">
            <label for="nama_lokasi_utama" class="form-label">Nama Lokasi Utama</label>
            <select class="form-select" name="nama_lokasi_utama" id="nama_lokasi_utama2_select"
                data-placeholder="--- Pilih Lokasi Utama ---">
                <option></option>
                <?php
                    $query = "select * from lokasi_utama";
                    $sql = mysqli_query($connect, $query);

                    while($result = mysqli_fetch_assoc($sql)){
                        $id_loc = $result['id_lokasi'];
                        $loc = $result['nama_lokasi_utama'];
                ?>
                    <?php
                    if($loc == $nm_loc){
                    ?>
                        <option value="<?php echo $nm_loc?>" selected>
                            <?php echo $nm_loc?>
                        </option>
                <?php
                    } else {
                ?>
                    <option value="<?php echo $loc?>">
                        <?php echo $loc?>
                    </option>
                <?php
                    }
                }
                ?>
            </select>
            <div class="valid-feedback">
                Nama Lokasi telah terisi
            </div>
            <div class="invalid-feedback">
                Nama Lokasi tidak boleh kosong
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success bg-gradient"
        name="form_process" value="edit_lokasi_sekunder">
        <i class="fa-solid fa-file-pen"></i>
        <span>Edit Data</span>
    </button>
</form>