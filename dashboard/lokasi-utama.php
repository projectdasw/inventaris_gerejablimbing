<?php
    if(isset($_SESSION['sukses-tambah-lokasi-utama'])){
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
    unset($_SESSION['sukses-tambah-lokasi-utama']);
    } elseif(isset($_SESSION['sukses-edit-lokasi-utama'])){
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
    unset($_SESSION['sukses-edit-lokasi-utama']);
    } elseif(isset($_SESSION['sukses-hapus-lokasi-utama'])){
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
    unset($_SESSION['sukses-hapus-lokasi-utama']);
    } 
?>
<div class="d-flex flex-row justify-content-end">
    <a class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#tambah_lokasiutama">
        <i class="fa-solid fa-plus"></i>
        Tambah Lokasi Utama
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
    <table id="datamaster-loc" class="table table-hover">
        <thead>
            <tr>
                <th>ID Lokasi</th>
                <th>Nama Lokasi</th>
                <th>Bangunan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID Lokasi</th>
                <th>Nama Lokasi</th>
                <th>Bangunan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>