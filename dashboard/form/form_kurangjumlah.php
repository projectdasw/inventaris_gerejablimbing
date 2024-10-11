<?php
    $id_brg = '';
    $nm_brg = '';
    $jml_brg = '';
    $nm_bangunan = '';
    $nm_loc = '';
    $nm_los = '';
    $knd_brg = '';
    $ket_brg = '';

    if(isset($_GET['kurangjumlah_barang'])){
        $id_brg = $_GET['kurangjumlah_barang'];

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
            <label for="nama_bangunan" class="form-label">Bangunan</label>
            <input class="form-control" name="nama_bangunan" id="nama_bangunan"
            value="<?php echo $nm_bangunan?>" readonly>
        </div>
        <div class="col mb-3">
            <label for="nama_lokasi_utama" class="form-label">Lokasi Utama</label>
            <input class="form-control" name="nama_lokasi_utama" id="nama_lokasi_utama"
            value="<?php echo $nm_loc?>" readonly>
        </div>
        <div class="col mb-3">
            <label for="nama_lokasi_sekunder" class="form-label">Lokasi Sekunder</label>
            <input class="form-control" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder"
            value="<?php echo $nm_los?>" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="id_barang" class="form-label">ID Barang</label>
            <input type="text" class="form-control" name="id_barang" id="id_barang"
            value="<?php echo $id_brg; ?>" readonly>
        </div>
        <div class="col mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang"
            value="<?php echo $nm_brg; ?>" readonly>
        </div>
        <div class="col mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang saat ini</label>
            <input type="number" class="form-control" value="<?php echo $jml_brg; ?>" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="jumlah" class="form-label">Jumlah yang ingin ditambahkan</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
            <div class="valid-feedback">
                Jumlah telah diisi
            </div>
            <div class="invalid-feedback">
                Masukkan jumlah yang ditambahkan
            </div>
        </div>
        <div class="col mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="number" class="form-control" name="deskripsi" id="deskripsi" required></textarea>
            <div class="valid-feedback">
                Deskripsi telah terisi
            </div>
            <div class="invalid-feedback">
                Harap masukkan alasan Anda menambahkan barang tersebut
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-danger"
        name="form_process" value="kurangi_jumlah">
        <i class="fa-solid fa-plus-minus"></i>
        <span>Kurangkan</span>
    </button>
</form>