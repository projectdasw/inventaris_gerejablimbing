<?php
    $id_brg = '';
    $nm_brg = '';
    $jml_brg = '';
    $nm_bangunan = '';
    $nm_loc = '';
    $nm_los = '';
    $knd_brg = '';
    $ket_brg = '';

    if(isset($_GET['ubah_barang'])){
        $id_brg = $_GET['ubah_barang'];

        $query = "select * from barang_gereja where id_barang = '$id_brg'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm_brg = $view_edit['nama_barang'];
        $jml_brg = $view_edit['jumlah'];
        $nm_bangunan = $view_edit['nama_bangunan'];
        $nm_loc = $view_edit['nama_lokasi_utama'];
        $nm_los = $view_edit['nama_lokasi_sekunder'];
        $knd_brg = $view_edit['kondisi'];
        $ket_brg = $view_edit['keterangan_kondisi'];
    }
?>
<form class="needs-validation" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off" novalidate>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_brg; ?>">
    <div class="row">
        <div class="col mb-3">
            <label for="id_barang" class="form-label">ID Barang</label>
            <input type="text" class="form-control" name="id_barang" id="id_barang"
                value="<?php echo $id_brg; ?>" readonly>
            <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                Nomor ID tidak bisa di edit
            </span>
        </div>
        <div class="col mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                value="<?php echo $nm_brg; ?>" required>
            <div class="valid-feedback">
                Nama Barang telah terisi
            </div>
            <div class="invalid-feedback">
                Nama Barang tidak boleh kosong
            </div>
        </div>
        <div class="col mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah"
                value="<?php echo $jml_brg; ?>" readonly>
            <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                Jumlah Barang tidak boleh di edit
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="nama_bangunan" class="form-label">Bangunan</label>
            <select class="form-select" name="nama_bangunan" id="nama_bangunan"
                value="<?php echo $nm_bangunan?>" required>
                <option disabled value="">
                    --- Pilih Bangunan ---
                </option>
                <?php
                    $query = "select * from bangunan";
                    $sql = mysqli_query($connect, $query);

                    while($result = mysqli_fetch_assoc($sql)){
                        $id_bgn = $result['id_bangunan'];
                        $nm_bgn = $result['nama_bangunan'];
                ?>
                    <?php
                    if($nm_bgn == $nm_bangunan){
                    ?>
                        <option value="<?php echo $nm_bangunan?>" selected>
                            <?php echo $nm_bangunan?>
                        </option>
                <?php
                    } else {
                ?>
                    <option value="<?php echo $nm_bgn?>">
                        <?php echo $nm_bgn?>
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
            <label for="nama_lokasi_utama" class="form-label">Lokasi Utama</label>
            <select class="form-select" name="nama_lokasi_utama" id="nama_lokasi_utama"
                value="<?php echo $nm_loc?>" required>
                <option disabled value="">
                    --- Pilih Bangunan ---
                </option>
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
                Kategori Lokasi Utama telah dipilih
            </div>
            <div class="invalid-feedback">
                Harap pilih untuk kategori Lokasi Utama
            </div>
        </div>
        <div class="col mb-3">
            <label for="nama_lokasi_sekunder" class="form-label">Lokasi Sekunder</label>
            <select class="form-select" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder"
                value="<?php echo $nm_los?>" required>
                <option disabled value="">
                    --- Pilih Lokasi Sekunder ---
                </option>
                <?php
                    $query = "select * from lokasi_sekunder";
                    $sql = mysqli_query($connect, $query);

                    while($result = mysqli_fetch_assoc($sql)){
                        $id_los = $result['id_lokasi_sekunder'];
                        $los = $result['nama_lokasi_sekunder'];
                ?>
                    <?php
                    if($los == $nm_los){
                    ?>
                        <option value="<?php echo $nm_los?>" selected>
                            <?php echo $nm_los?>
                        </option>
                <?php
                    } else {
                ?>
                    <option value="<?php echo $los?>">
                        <?php echo $los?>
                    </option>
                <?php
                    }
                }
                ?>
            </select>
            <div class="valid-feedback">
                Kategori Lokasi Sekunder telah dipilih
            </div>
            <div class="invalid-feedback">
                Harap pilih untuk kategori Lokasi Sekunder
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="kondisi" class="form-label">Kondisi Barang</label>
            <textarea type="text" class="form-control" name="kondisi" id="kondisi"><?php echo $knd_brg; ?></textarea>
            <div class="valid-feedback">
                Kondisi boleh dikosongi
            </div>
        </div>
        <div class="col mb-3">
            <label for="keterangan_kondisi" class="form-label">Keterangan Barang</label>
            <textarea type="text" class="form-control" name="keterangan_kondisi" id="keterangan_kondisi"><?php echo $ket_brg; ?></textarea>
            <div class="valid-feedback">
                Keterangan Kondisi boleh dikosongi
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success bg-gradient"
        name="form_process" value="edit_barang">
        <i class="fa-solid fa-file-pen"></i>
        <span>Edit Data</span>
    </button>
</form>