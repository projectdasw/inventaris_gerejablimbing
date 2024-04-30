<form class="form-container form-column" action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="form-group">
        <label for="nama_barang">
            Nama Barang
        </label>
        <input type="text">
    </div>
    <div class="form-group">
        <label for="id_barang">
            ID Barang
        </label>
        <input type="text" readonly>
    </div>
    <div class="form-group">
        <label for="nama_bangunan">
            Bangunan
        </label>
        <select name="" id="" readonly>
            <option disabled selected>
                --- Pilih Bangunan ---
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="nama_lokasi_utama">
            Lokasi Utama
        </label>
        <select name="" id="" readonly>
            <option disabled selected>
                --- Pilih Lokasi Utama ---
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="nama_lokasi_sekunder">
            Lokasi Sekunder
        </label>
        <select name="" id="" readonly>
            <option disabled selected>
                --- Pilih Lokasi Sekunder ---
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah">
            Jumlah Barang
        </label>
        <input type="number">
        <span class="info">
            Jumlah data [Nama Barang] saat ini [Jumlah Data]
        </span>
    </div>
    <div class="form-group">
        <label for="kondisi">
            Kondisi Barang
        </label>
        <textarea name="" id="" cols="53" rows="4" readonly></textarea>
    </div>
    <div class="form-group">
        <label for="keterangan_kondisi">
            Keterangan Barang
        </label>
        <textarea name="" id="" cols="53" rows="4" readonly></textarea>
    </div>
    <div class="button-form">
        <button class="btn btn-success">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Tambah Jumlah</span>
        </button>
    </div>
</form>