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
                                    $id_loc = $result['id_lokasi'];
                                    $nm_loc = $result['nama_lokasi_utama'];
                            ?>
                                <option value="<?php echo $nm_loc?>">
                                    <?php echo $nm_loc?>
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
                        <label for="nama_lokasi_sekunder" class="form-label">Lokasi Sekunder</label>
                        <select class="form-select" name="nama_lokasi_sekunder" id="nama_lokasi_sekunder" required>
                            <option disabled selected value="">
                                --- Pilih Lokasi Sekunder ---
                            </option>
                            <?php
                                $query = "select * from lokasi_sekunder";
                                $sql = mysqli_query($connect, $query);

                                while($result = mysqli_fetch_assoc($sql)){
                                    $id_los = $result['id_lokasi_sekunder'];
                                    $nm_los = $result['nama_lokasi_sekunder'];
                            ?>
                                <option value="<?php echo $nm_los?>">
                                    <?php echo $nm_los?>
                                </option>
                            <?php
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