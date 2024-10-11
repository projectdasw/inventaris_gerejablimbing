<?php
    if(isset($_SESSION['sukses-tambah-lokasi-sekunder'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil disimpan",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-tambah-lokasi-sekunder']);
    } elseif(isset($_SESSION['sukses-edit-lokasi-sekunder'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil di ubah",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-edit-lokasi-sekunder']);
    } elseif(isset($_SESSION['sukses-hapus-lokasi-sekunder'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil di hapus",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-hapus-lokasi-sekunder']);
    } 
?>
<div class="d-flex flex-row justify-content-end">
    <a class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#tambah_lokasisekunder">
        <i class="fa-solid fa-plus"></i>
        Tambah Lokasi Sekunder
    </a>
    <a href="" class="btn btn-outline-danger me-2">
        <i class="fa-solid fa-file-pdf"></i>
        PDF
    </a>
    <a href="" class="btn btn-outline-success">
        <i class="fa-solid fa-file-excel"></i>
        Excel
    </a>
</div>
<div class="bg-light overflow-x-auto">
    <table id="datamaster-los" class="table table-hover">
        <thead>
            <tr>
                <th>ID Lokasi</th>
                <th>Nama Lokasi Sekunder</th>
                <th>Lokasi Utama</th>
                <th>Bangunan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID Lokasi</th>
                <th>Nama Lokasi Sekunder</th>
                <th>Lokasi Utama</th>
                <th>Bangunan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>