<div class="modal fade" id="editbangunan<?php echo $id_bgn; ?>" tabindex="-1" aria-labelledby="modal-editbangunan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <input type="hidden" name="id_bangunan" id="id_bangunan" value="<?php echo $id_bgn; ?>">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-editbangunan">
          Edit Data Bangunan - <?php echo $nm_bgn; ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" action="../inc/process.php" method="post"
            enctype="multipart/form-data" autocomplete="off" novalidate>
            <div class="mb-3">
                <label for="id_bangunan" class="form-label">ID Bangunan</label>
                <input type="text" class="form-control" name="id_bangunan" id="id_bangunan"
                    value="<?php echo $id_bgn; ?>" readonly>
                <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                    Nomor ID tidak bisa di edit
                </span>
            </div>
            <div class="mb-3">
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
                name="form_process" value="edit_bangunan">
                <i class="fa-solid fa-file-pen"></i>
                <span>Edit Data</span>
            </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          <i class="fa-solid fa-circle-xmark"></i>
          <span>Batal</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_lokasiutama<?php echo $id_loc; ?>" tabindex="-1" aria-labelledby="modal-editlokasiutama" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <input type="hidden" name="id_lokasi" id="id_lokasi" value="<?php echo $id_loc; ?>">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-editlokasiutama">
          Edit Data Lokasi Utama - <?php echo $loc_utm; ?>
        </h1>
      </div>
      <div class="modal-body">
        <form class="needs-validation" action="../inc/process.php" method="post"
            enctype="multipart/form-data" autocomplete="off" novalidate>
            <div class="mb-3">
                <label for="id_lokasi" class="form-label">ID Lokasi</label>
                <input type="text" class="form-control" name="id_lokasi" id="id_lokasi"
                    value="<?php echo $id_loc; ?>" readonly>
                <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                    Nomor ID tidak bisa di edit
                </span>
            </div>
            <div class="mb-3">
                <label for="nama_lokasi_utama" class="form-label">Nama Lokasi</label>
                <input type="text" class="form-control" name="nama_lokasi_utama" id="nama_lokasi_utama"
                  value="<?php echo $loc_utm; ?>" required>
                <div class="valid-feedback">
                    Nama Lokasi telah terisi
                </div>
                <div class="invalid-feedback">
                    Nama Lokasi tidak boleh kosong
                </div>
            </div>
            <div class="mb-3">
                <label for="nama_bangunan" class="form-label">Bangunan</label>
                <select class="form-select" name="nama_bangunan" id="nama_bangunan"
                  value="<?php echo $loc_bgn?>" required>
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
                        if($nm_bgn == $loc_bgn){
                      ?>
                          <option value="<?php echo $loc_bgn?>" selected>
                              <?php echo $loc_bgn?>
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
            <button type="submit" class="btn btn-success bg-gradient"
                name="form_process" value="edit_lokasi_utama">
                <i class="fa-solid fa-file-pen"></i>
                <span>Edit Data</span>
            </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          <i class="fa-solid fa-circle-xmark"></i>
          <span>Batal</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_lokasisekunder<?php echo $id_los; ?>" tabindex="-1" aria-labelledby="modal-editlokasisekunder" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <input type="hidden" name="id_lokasi_sekunder" id="id_lokasi_sekunder" value="<?php echo $id_los; ?>">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-editlokasisekunder">
          Edit Data Lokasi Sekunder - <?php echo $los_sknd; ?>
        </h1>
      </div>
      <div class="modal-body">
        <form class="needs-validation" action="../inc/process.php" method="post"
            enctype="multipart/form-data" autocomplete="off" novalidate>
            <div class="mb-3">
                <label for="id_lokasi_sekunder" class="form-label">ID Lokasi</label>
                <input type="text" class="form-control" name="id_lokasi_sekunder" id="id_lokasi_sekunder"
                    value="<?php echo $id_los; ?>" readonly>
                <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                    Nomor ID tidak bisa di edit
                </span>
            </div>
            <div class="mb-3">
                <label for="nama_lokasi_sekunder" class="form-label">Nama Lokasi</label>
                <input type="text" class="form-control" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder"
                  value="<?php echo $los_sknd; ?>" required>
                <div class="valid-feedback">
                    Nama Lokasi telah terisi
                </div>
                <div class="invalid-feedback">
                    Nama Lokasi tidak boleh kosong
                </div>
            </div>
            <div class="mb-3">
                <label for="nama_lokasi_utama" class="form-label">Lokasi Utama</label>
                <select class="form-select" name="nama_lokasi_utama" id="nama_lokasi_utama"
                  value="<?php echo $loc_sknd?>" required>
                    <option disabled value="">
                        --- Pilih Lokasi Utama ---
                    </option>
                    <?php
                        $query = "select * from lokasi_utama";
                        $sql = mysqli_query($connect, $query);

                        while($result = mysqli_fetch_assoc($sql)){
                            $id_loc = $result['id_lokasi'];
                            $loc = $result['nama_lokasi_utama'];
                    ?>
                      <?php
                        if($loc == $loc_sknd){
                      ?>
                          <option value="<?php echo $loc_sknd?>" selected>
                              <?php echo $loc_sknd?>
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
            <div class="mb-3">
                <label for="nama_bangunan" class="form-label">Bangunan</label>
                <select class="form-select" name="nama_bangunan" id="nama_bangunan"
                  value="<?php echo $loc_bgn?>" required>
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
                        if($nm_bgn == $bgn_sknd){
                      ?>
                          <option value="<?php echo $bgn_sknd?>" selected>
                              <?php echo $bgn_sknd?>
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
            <button type="submit" class="btn btn-success bg-gradient"
                name="form_process" value="edit_lokasi_sekunder">
                <i class="fa-solid fa-file-pen"></i>
                <span>Edit Data</span>
            </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          <i class="fa-solid fa-circle-xmark"></i>
          <span>Batal</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_akun<?php echo $id_akn; ?>" tabindex="-1" aria-labelledby="modal_editakun" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_editakun">
                    Edit Akun Inventaris Gereja
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="../inc/process.php" method="post"
                    enctype="multipart/form-data" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label for="id_akun" class="form-label">ID Akun</label>
                        <input type="text" class="form-control" name="id_akun" id="id_akun"
                            value="<?php echo $id_akn; ?>" readonly>
                        <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                            Nomor ID secara otomatis akan tergenerasi
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="nama_akun" class="form-label">Nama Akun</label>
                        <input type="text" class="form-control" name="nama_akun" id="nama_akun"
                            value="<?php echo $nm_akn; ?>" required>
                        <div class="valid-feedback">
                            Nama Akun telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Nama Akun tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="<?php echo $user_akn; ?>" required>
                        <div class="valid-feedback">
                            Username telah terisi
                        </div>
                        <div class="invalid-feedback">
                            Username tidak boleh kosong
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Akun</label>
                        <input type="text" class="form-control" name="password" id="password"
                            value="<?php echo $pass_akn; ?>" required>
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
                            <?php if($lvl_akn == "Admin"){ ?>
                                <option value="Admin" selected>Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            <?php } else if($lvl_akn == "Super Admin"){ ?>
                                <option value="Admin">Admin</option>
                                <option value="Super Admin" selected>Super Admin</option>
                            <?php } else { ?>
                            <?php } ?>
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
                            pattern="8[0-9]*" value="<?php echo $no_hp_akn; ?>" required>
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
                        name="form_process" value="edit_akun">
                        <i class="fa-solid fa-file-pen"></i>
                        <span>Edit Data</span>
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

<div class="modal fade" id="editbarang<?php echo $id_brg; ?>" tabindex="-1" aria-labelledby="modal-editbarang" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-editbarang">
          Edit Barang Inventaris - <?php echo $nm_brg; ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" action="../inc/process.php" method="post"
            enctype="multipart/form-data" autocomplete="off" novalidate>
            <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_brg; ?>">
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID Barang</label>
                <input type="text" class="form-control" name="id_barang" id="id_barang"
                    value="<?php echo $id_brg; ?>" readonly>
                <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                    Nomor ID tidak bisa di edit
                </span>
            </div>
            <div class="mb-3">
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
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah"
                  value="<?php echo $jml_brg; ?>" readonly>
                  <span class="badge text-bg-primary mt-2" style="font-size: 14px;">
                      Jumlah Barang tidak boleh di edit
                  </span>
            </div>
            <div class="mb-3">
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
            <div class="mb-3">
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
            <div class="mb-3">
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
            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi Barang</label>
                <textarea type="text" class="form-control" name="kondisi" id="kondisi"><?php echo $knd_brg; ?></textarea>
                <div class="valid-feedback">
                    Kondisi boleh dikosongi
                </div>
            </div>
            <div class="mb-3">
                <label for="keterangan_kondisi" class="form-label">Keterangan Barang</label>
                <textarea type="text" class="form-control" name="keterangan_kondisi" id="keterangan_kondisi"><?php echo $ket_brg; ?></textarea>
                <div class="valid-feedback">
                    Keterangan Kondisi boleh dikosongi
                </div>
            </div>
            <button type="submit" class="btn btn-success bg-gradient"
                name="form_process" value="edit_barang">
                <i class="fa-solid fa-file-pen"></i>
                <span>Edit Data</span>
            </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          <i class="fa-solid fa-circle-xmark"></i>
          <span>Batal</span>
        </button>
      </div>
    </div>
  </div>
</div>