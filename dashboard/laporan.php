<div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Bangunan</h5>
                <p class="card-text">
                    Data inventaris lahan/gedung yang dimiliki gereja
                </p>
                <a href="index.php?laporan_bangunan=laporan_bangunan.php" class="btn btn-outline-primary">Tampilkan Data</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Lokasi Utama</h5>
                <p class="card-text">
                    Data inventaris fasilitas primer yang dimiliki gereja
                </p>
                <a href="index.php?laporan_lokasiutama=laporan_lokasiutama.php" class="btn btn-outline-primary">Tampilkan Data</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Lokasi Sekunder</h5>
                <p class="card-text">
                    Data inventaris fasilitas sekunder maupun perlengkapan yang dimiliki gereja
                </p>
                <a href="index.php?laporan_lokasisekunder=laporan_lokasisekunder.php" class="btn btn-outline-primary">Tampilkan Data</a>
            </div>
        </div>
    </div>
</div>
<div class="bg-light overflow-x-auto">
    <div class="d-flex flex-row justify-content-between align-items-center
        border-bottom border-danger border-2 mb-2">
        <div>
            <h2 class="fs-4">
                Data Transaksi Harta Benda
            </h2>
            <span>
                Gereja Katolik Paroki St. Albertus de Trapani Malang
            </span>
        </div>
        <div>
            <a href='' class='btn btn-danger'>
                <i class='fa-solid fa-file-pdf'></i>
                PDF
            </a>
            <a href='' class='btn btn-success'>
                <i class='fa-solid fa-file-excel'></i>
                Excel
            </a>
        </div>
    </div>
    <table id="trans_barang" class="table table-sm table-hover">
        <thead>
            <tr>
                <th>Hari/Tanggal</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Hari/Tanggal</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Bangunan</th>
                <th>Lokasi Utama</th>
                <th>Lokasi Sekunder</th>
            </tr>
        </tfoot>
    </table>
</div>