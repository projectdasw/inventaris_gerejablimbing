<?php
    $id_loc = '';
    $nm_loc = '';
    $nm_bgn = '';

    if(isset($_GET['ubah_lokasiutama'])){
        $id_loc = $_GET['ubah_lokasiutama'];

        $query = "select * from lokasi_utama where id_lokasi = '$id_loc'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm_loc = $view_edit['nama_lokasi_utama'];
        $nm_bgn = $view_edit['nama_bangunan'];
    }
?>
<form class="needs-validation" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off" novalidate>
    <input type="hidden" name="id_lokasi" id="id_lokasi" value="<?php echo $id_loc; ?>">
    <div class="row">
        <div class="col mb-3">
            <label for="id_lokasi" class="form-label">ID Lokasi</label>
            <input type="text" class="form-control" name="id_lokasi" id="id_lokasi"
                value="<?php echo $id_loc; ?>" readonly>
            <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                Nomor ID tidak bisa di edit
            </span>
        </div>
        <div class="col mb-3">
            <label for="nama_lokasi_utama" class="form-label">Nama Lokasi</label>
            <input type="text" class="form-control" name="nama_lokasi_utama" id="nama_lokasi_utama"
                value="<?php echo $nm_loc; ?>" required>
            <div class="valid-feedback">
                Nama Lokasi telah terisi
            </div>
            <div class="invalid-feedback">
                Nama Lokasi tidak boleh kosong
            </div>
        </div>
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
    </div>
    <button type="submit" class="btn btn-success bg-gradient"
        name="form_process" value="edit_lokasi_utama">
        <i class="fa-solid fa-file-pen"></i>
        <span>Edit Data</span>
    </button>
</form>