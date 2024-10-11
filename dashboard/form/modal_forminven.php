<div class="modal fade" id="tambah_baru" tabindex="-1" aria-labelledby="modal_tambahbaru" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_tambahbaru">
                    Tambah Barang Baru
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="../inc/process.php" method="post"
                    enctype="multipart/form-data" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label for="id_barang" class="form-label">ID Barang</label>
                        <?php
                            $word = "IHB-";
                            $number = random_int(00000, 99999);
                            $auto_no = $word . sprintf("%05s", $number);
                        ?>
                        <input type="text" class="form-control" name="id_barang" id="id_barang"
                            value="<?php echo $auto_no; ?>" readonly>
                        <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                            Nomor ID secara otomatis akan tergenerasi
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                        <div class="valid-feedback">
                            Nama Barang telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nama Barang tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                        <div class="valid-feedback">
                            Jumlah Barang telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Jumlah Barang tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3 flex-fill">
                        <label for="nama_bangunan" class="form-label">Bangunan</label>
                        <select class="form-select" name="nama_bangunan" id="nama_bangunan_select"
                            data-placeholder="--- Pilih Bangunan ---" onchange="FetchLOC(this.value)" required>
                            <option></option>
                            <?php
                                $query = "select * from bangunan";
                                $sql = mysqli_query($connect, $query);

                                while($result = mysqli_fetch_assoc($sql)){
                                    $id_bgn = $result['id_bangunan'];
                                    $nm_bgn = $result['nama_bangunan'];
                            ?>
                                <option value="<?php echo $nm_bgn?>">
                                    <?php echo $nm_bgn?>
                                </option>
                            <?php
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
                    <div class="mb-3 flex-fill">
                        <label for="nama_lokasi_utama" class="form-label">Lokasi Utama</label>
                        <select class="form-select" name="nama_lokasi_utama" id="nama_lokasi_utama_select"
                            data-placeholder="--- Pilih Lokasi Utama ---" onchange="FetchLOS(this.value)" required>
                        </select>
                        <div class="valid-feedback">
                            Kategori Lokasi Utama telah dipilih
                        </div>
                        <div class="invalid-feedback">
                            Harap pilih untuk kategori Lokasi Utama
                        </div>
                    </div>
                    <div class="mb-3 flex-fill">
                        <label for="nama_lokasi_sekunder" class="form-label">Lokasi Sekunder</label>
                        <select class="form-select" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder_select"
                            data-placeholder="--- Pilih Lokasi Sekunder ---">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi Barang</label>
                        <textarea type="text" class="form-control" name="kondisi" id="kondisi"></textarea>
                        <div class="valid-feedback">
                            Kondisi boleh dikosongi
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan_kondisi" class="form-label">Keterangan Barang</label>
                        <textarea type="text" class="form-control" name="keterangan_kondisi" id="keterangan_kondisi"></textarea>
                        <div class="valid-feedback">
                            Keterangan Kondisi boleh dikosongi
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success bg-gradient"
                        name="form_process" value="tambah_baru">
                        <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                        <span>Simpan Data</span>
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark me-1"></i>
                    <span>Batal</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_bangunan" tabindex="-1" aria-labelledby="modal_tambahbangunan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_tambahbangunan">
                    Tambah Bangunan
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="../inc/process.php" method="post"
                    enctype="multipart/form-data" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label for="id_bangunan" class="form-label">ID Bangunan</label>
                        <?php
                            $query = mysqli_query($connect, "SELECT MAX(id_bangunan) as kodeTerbesar FROM bangunan");
                            $data = mysqli_fetch_array($query);
                            $kodeBarang = $data['kodeTerbesar'];
                            $urutan = substr($kodeBarang, 3, 4);
                            $urutan++;
                            $word = "HBP";
                            $auto_no = $word . sprintf("%04s", $urutan);
                        ?>
                        <input type="text" class="form-control" name="id_bangunan" id="id_bangunan"
                            value="<?php echo $auto_no; ?>" readonly>
                        <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                            Nomor ID secara otomatis akan tergenerasi
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="nama_bangunan" class="form-label">Nama Bangunan</label>
                        <input type="text" class="form-control" name="nama_bangunan" id="nama_bangunan" required>
                        <div class="valid-feedback">
                            Nama Bangunan telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nama Bangunan tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="foto_bangunan" class="form-label">Foto Bangunan</label>
                        <input type="file" class="form-control" name="foto_bangunan" id="foto_bangunan" disabled>
                        <span class="badge text-bg-danger mt-2" style="font-size: 14px;">
                            Fitur upload Foto belum dapat digunakan
                        </span>
                        <div class="valid-feedback">
                            Nama Bangunan telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nama Bangunan tidak boleh kosong
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success bg-gradient"
                        name="form_process" value="tambah_bangunan">
                        <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                        <span>Simpan Data</span>
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark me-1"></i>
                    <span>Batal</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_lokasiutama" tabindex="-1" aria-labelledby="modal_tambahlokasiutama" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_tambahlokasiutama">
                    Tambah Lokasi Utama
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="../inc/process.php" method="post"
                    enctype="multipart/form-data" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label for="id_lokasi" class="form-label">ID Lokasi</label>
                        <?php
                            $query = mysqli_query($connect, "SELECT MAX(id_lokasi) as kodeTerbesar FROM lokasi_utama");
                            $data = mysqli_fetch_array($query);
                            $kodeBarang = $data['kodeTerbesar'];
                            $urutan = substr($kodeBarang, 3, 4);
                            $urutan++;
                            $word = "LOC";
                            $auto_no = $word . sprintf("%04s", $urutan);
                        ?>
                        <input type="text" class="form-control" name="id_lokasi" id="id_lokasi"
                            value="<?php echo $auto_no; ?>" readonly>
                        <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                            Nomor ID secara otomatis akan tergenerasi
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lokasi_utama" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" name="nama_lokasi_utama" id="nama_lokasi_utama" required>
                        <div class="valid-feedback">
                            Nama Lokasi telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nama Lokasi tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_bangunan" class="form-label">Bangunan</label>
                        <select class="form-select" name="nama_bangunan" id="nama_bangunan3_select"
                            data-placeholder="--- Pilih Bangunan ---">
                            <option></option>
                            <?php
                                $query = "select * from bangunan";
                                $sql = mysqli_query($connect, $query);

                                while($result = mysqli_fetch_assoc($sql)){
                                    $id_bgn = $result['id_bangunan'];
                                    $nm_bgn = $result['nama_bangunan'];
                            ?>
                                <option value="<?php echo $nm_bgn?>">
                                    <?php echo $nm_bgn?>
                                </option>
                            <?php
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
                    <button type="submit" class="btn btn-success bg-gradient"
                        name="form_process" value="tambah_lokasi_utama">
                        <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                        <span>Simpan Data</span>
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark me-1"></i>
                    <span>Batal</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_lokasisekunder" tabindex="-1" aria-labelledby="modal_tambahlokasisekunder" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_tambahlokasisekunder">
                    Tambah Lokasi Sekunder
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="../inc/process.php" method="post"
                    enctype="multipart/form-data" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label for="id_lokasi_sekunder" class="form-label">ID Lokasi</label>
                        <?php
                            $query = mysqli_query($connect, "SELECT MAX(id_lokasi_sekunder) as kodeTerbesar FROM lokasi_sekunder");
                            $data = mysqli_fetch_array($query);
                            $kodeBarang = $data['kodeTerbesar'];
                            $urutan = substr($kodeBarang, 3, 4);
                            $urutan++;
                            $word = "LOS";
                            $auto_no = $word . sprintf("%04s", $urutan);
                        ?>
                        <input type="text" class="form-control" name="id_lokasi_sekunder" id="id_lokasi_sekunder"
                            value="<?php echo $auto_no; ?>" readonly>
                        <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                            Nomor ID secara otomatis akan tergenerasi
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lokasi_sekunder" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder" required>
                        <div class="valid-feedback">
                            Nama Lokasi telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nama Lokasi tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lokasi_utama" class="form-label">Lokasi Utama</label>
                        <select class="form-select" name="nama_lokasi_utama" id="nama_lokasi_utama" required>
                            <option disabled selected value="">
                                --- Pilih Lokasi Utama ---
                            </option>
                            <?php
                                $query = "select * from lokasi_utama";
                                $sql = mysqli_query($connect, $query);

                                while($result = mysqli_fetch_assoc($sql)){
                                    $id_locs = $result['id_lokasi'];
                                    $nm_locs = $result['nama_lokasi_utama'];
                            ?>
                                <option value="<?php echo $nm_locs?>">
                                    <?php echo $nm_locs?>
                                </option>
                            <?php
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
                    <div class="mb-3">
                        <label for="nama_bangunan" class="form-label">Bangunan</label>
                        <select class="form-select" name="nama_bangunan" id="nama_bangunan" required>
                            <option disabled selected value="">
                                --- Pilih Bangunan ---
                            </option>
                            <?php
                                $query = "select * from bangunan";
                                $sql = mysqli_query($connect, $query);

                                while($result = mysqli_fetch_assoc($sql)){
                                    $id_bgn = $result['id_bangunan'];
                                    $nm_bgn = $result['nama_bangunan'];
                            ?>
                                <option value="<?php echo $nm_bgn?>">
                                    <?php echo $nm_bgn?>
                                </option>
                            <?php
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
                    <button type="submit" class="btn btn-success bg-gradient"
                        name="form_process" value="tambah_lokasi_sekunder">
                        <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                        <span>Simpan Data</span>
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark me-1"></i>
                    <span>Batal</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_akun" tabindex="-1" aria-labelledby="modal_tambahakun" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_tambahakun">
                    Tambah Akun Inventaris Gereja
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="../inc/process.php" method="post"
                    enctype="multipart/form-data" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label for="id_akun" class="form-label">ID Akun</label>
                        <?php
                            $word = "AIG-";
                            $number = random_int(00000, 99999);
                            $auto_no = $word . sprintf("%05s", $number);
                        ?>
                        <input type="text" class="form-control" name="id_akun" id="id_akun"
                            value="<?php echo $auto_no; ?>" readonly>
                        <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                            Nomor ID secara otomatis akan tergenerasi
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="nama_akun" class="form-label">Nama Akun</label>
                        <input type="text" class="form-control" name="nama_akun" id="nama_akun" required>
                        <div class="valid-feedback">
                            Nama Akun telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nama Akun tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        <div class="valid-feedback">
                            Username telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Username tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Akun</label>
                        <input type="text" class="form-control" name="password" id="password" required>
                        <div class="valid-feedback">
                            Password telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="level_akun" class="form-label">Level Akun</label>
                        <select class="form-select" name="level_akun" id="level_akun" required>
                            <option disabled selected value="">
                                --- Pilih Level Akun ---
                            </option>
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                        </select>
                        <div class="valid-feedback">
                            Level Akun telah dipilih
                        </div>
                        <div class="invalid-feedback">
                            Harap pilih untuk Level Akun
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. Hp/WhatsApp</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp"
                            pattern="8[0-9]*" required>
                        <div class="valid-feedback">
                            Nomor HP telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nomor HP Invalid
                        </div>
                        <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                            Contoh Input Nomor HP: 8716253454
                        </span>
                    </div>
                    <button type="submit" class="btn btn-success bg-gradient"
                        name="form_process" value="tambah_akun">
                        <i class="fa-solid fa-cloud-arrow-up me-1"></i>
                        <span>Simpan Data</span>
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
                    <i class="fa-solid fa-circle-xmark me-1"></i>
                    <span>Batal</span>
                </button>
            </div>
        </div>
    </div>
</div>