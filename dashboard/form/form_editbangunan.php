<?php
    $id_bgn = '';
    $nm_bgn = '';

    if(isset($_GET['ubah_bangunan'])){
        $id_bgn = $_GET['ubah_bangunan'];

        $query = "select * from bangunan where id_bangunan = '$id_bgn'";
        $sql = mysqli_query($connect, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm_bgn = $view_edit['nama_bangunan'];
    }
?>
<form class="needs-validation" action="../inc/process.php" method="post"
    enctype="multipart/form-data" autocomplete="off" novalidate>
    <input type="hidden" name="id_bangunan" id="id_bangunan" value="<?php echo $id_brg; ?>">
    <div class="row">
        <div class="col mb-3">
            <label for="id_bangunan" class="form-label">ID Bangunan</label>
            <input type="text" class="form-control" name="id_bangunan" id="id_bangunan"
                value="<?php echo $id_bgn; ?>" readonly>
            <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                Nomor ID tidak bisa di edit
            </span>
        </div>
        <div class="col mb-3">
            <label for="nama_bangunan" class="form-label">Nama Bangunan</label>
            <input type="text" class="form-control" name="nama_bangunan" id="nama_bangunan"
                value="<?php echo $nm_bgn; ?>" required>
            <div class="valid-feedback">
                Nama Bangunan telah terisi
            </div>
            <div class="invalid-feedback">
                Nama Bangunan tidak boleh kosong
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success bg-gradient"
        name="form_process" value="edit_bangunan">
        <i class="fa-solid fa-file-pen"></i>
        <span>Edit Data</span>
    </button>
    <a href="index.php?bangunan=bangunan.php" class="btn btn-danger bg-gradient">
        <i class="fa-regular fa-circle-xmark"></i>
        <span>Batal Edit</span>
    </a>
</form>