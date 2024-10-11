<?php
    if(isset($_SESSION['sukses-tambah-akun'])){
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
    unset($_SESSION['sukses-tambah-akun']);
    } elseif(isset($_SESSION['sukses-edit-akun'])){
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
    unset($_SESSION['sukses-edit-akun']);
    } elseif(isset($_SESSION['sukses-hapus-akun'])){
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
    unset($_SESSION['sukses-hapus-akun']);
    } 
?>
<div class="d-flex flex-row justify-content-end">
    <a class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#tambah_akun">
        <i class="fa-solid fa-plus"></i>
        Tambah Akun
    </a>
</div>
<div class="bg-light overflow-x-auto">
    <table id="" class="display">
        <thead>
            <tr>
                <th>ID Akun</th>
                <th>Nama Akun</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level Akun</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $tampil_akun = "select * from akun";
                $tampil_akun_query = mysqli_query($connect,$tampil_akun);
                while($tampil_akun_hasil = mysqli_fetch_assoc($tampil_akun_query))
                {
                    $id_akn = $tampil_akun_hasil['id_akun'];
                    $nm_akn = $tampil_akun_hasil['nama_akun'];
                    $user_akn = $tampil_akun_hasil['username'];
                    $pass_akn = $tampil_akun_hasil['password'];
                    $lvl_akn = $tampil_akun_hasil['level_akun'];
                    $no_hp_akn = $tampil_akun_hasil['no_hp'];
            ?>
            <tr>
                <td><?php echo $id_akn;?></td>
                <td><?php echo $nm_akn;?></td>
                <td><?php echo $user_akn;?></td>
                <td><?php echo $pass_akn;?></td>
                <td><?php echo $lvl_akn;?></td>
                <td><?php echo $no_hp_akn;?></td>
                <td>
                    <a class="badge btn btn-success"
                        data-bs-toggle="modal" data-bs-target="#edit_akun<?php echo $id_akn; ?>">
                        <i class="fa-solid fa-pencil"></i>
                        <span>Edit</span>
                    </a>
                    <?php include "form/modal_editinven.php"; ?>
                    <a class="badge btn btn-danger"
                        href="../inc/process.php?hapus_akun=<?php echo $id_akn; ?>"
                        onclick="confirmDelete(event)">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Hapus</span>
                    </a>
                </td>
            </tr>
            <?php
                }
                mysqli_free_result($tampil_akun_query);            
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID Akun</th>
                <th>Nama Akun</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level Akun</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>