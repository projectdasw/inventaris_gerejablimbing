<?php
    if(isset($_SESSION['sukses-tambah-barang-baru'])){
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
    unset($_SESSION['sukses-tambah-barang-baru']);
    } elseif(isset($_SESSION['sukses-edit-barang'])){
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
    unset($_SESSION['sukses-edit-barang']);
    } elseif(isset($_SESSION['sukses-hapus-barang-baru'])){
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
    unset($_SESSION['sukses-hapus-barang-baru']);
    } elseif(isset($_SESSION['sukses-tambah-barang-ada'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Penambahan Jumlah Barang berhasil ditambahkan",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-tambah-barang-ada']);
    } elseif(isset($_SESSION['sukses-kurangi-barang'])){
?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Pengurangan Jumlah Barang berhasil dikurangkan",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
    unset($_SESSION['sukses-kurangi-barang']);
    }
?>
<div class="d-flex flex-row justify-content-end">
    <a class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#tambah_baru">
        <i class="fa-solid fa-plus"></i>
        Tambah Barang Baru
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
    <table id="datamaster" class="table table-hover">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>