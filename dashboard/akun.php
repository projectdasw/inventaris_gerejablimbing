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
<div class="bg-light p-3 rounded-4">
    <table id="table-data" class="display">
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
                    $id = $tampil_akun_hasil['id_akun'];
                    $nm = $tampil_akun_hasil['nama_akun'];
                    $user = $tampil_akun_hasil['username'];
                    $pass = $tampil_akun_hasil['password'];
                    $lvl = $tampil_akun_hasil['level_akun'];
                    $no_hp = $tampil_akun_hasil['no_hp'];
            ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $nm;?></td>
                <td><?php echo $user;?></td>
                <td><?php echo $pass;?></td>
                <td><?php echo $lvl;?></td>
                <td><?php echo $no_hp;?></td>
                <td>
                    <a class="badge btn btn-success"
                        data-bs-toggle="modal" data-bs-target="#editdata<?php echo $id; ?>">
                        <i class="fa-solid fa-pencil"></i>
                        <span>Ubah</span>
                    </a>
                    <?php include "../inc/modal_editakun.php"; ?>
                    <a class="badge btn btn-danger"
                        href="../inc/process.php?hapus_akun=<?php echo $id; ?>"
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