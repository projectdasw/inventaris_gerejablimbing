<div class="modal fade" id="laporanbangunan<?php echo $id; ?>" tabindex="-1" aria-labelledby="modal-laporan" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content overflow-x-auto">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-laporan">
            Data Laporan - <?php echo $nm; ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body overflow-x-auto">
        <table id="" class="display table table-hover w-100">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Bangunan</th>
                    <th>Lokasi Utama</th>
                    <th>Lokasi Sekunder</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $tampil_barang_gereja = "select * from barang_gereja where nama_bangunan='$nm'";
                    $tampil_barang_gereja_query = mysqli_query($connect,$tampil_barang_gereja);
                    while($tampil_barang_gereja_hasil = mysqli_fetch_assoc($tampil_barang_gereja_query))
                    {
                        $id = $tampil_barang_gereja_hasil['id_barang'];
                        $nm = $tampil_barang_gereja_hasil['nama_barang'];
                        $jml = $tampil_barang_gereja_hasil['jumlah'];
                        $knd = $tampil_barang_gereja_hasil['kondisi'];
                        $ket = $tampil_barang_gereja_hasil['keterangan_kondisi'];
                        $nm_bangunan = $tampil_barang_gereja_hasil['nama_bangunan'];
                        $nm_loc = $tampil_barang_gereja_hasil['nama_lokasi_utama'];
                        $nm_los = $tampil_barang_gereja_hasil['nama_lokasi_sekunder'];
                ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $nm;?></td>
                    <td><?php echo $jml;?></td>
                    <td><?php echo $knd;?></td>
                    <td><?php echo $ket;?></td>
                    <td><?php echo $nm_bangunan;?></td>
                    <td><?php echo $nm_loc;?></td>
                    <td><?php echo $nm_los;?></td>
                </tr>
                <?php
                    }
                    mysqli_free_result($tampil_barang_gereja_query);            
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Bangunan</th>
                    <th>Lokasi Utama</th>
                    <th>Lokasi Sekunder</th>
                </tr>
            </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
            <i class="fa-solid fa-circle-xmark me-1"></i>
            <span>Tutup</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="laporanlokasiutama<?php echo $id; ?>" tabindex="-1" aria-labelledby="modal-laporan" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content overflow-x-auto">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-laporan">
            Data Laporan - <?php echo $nm; ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
          <input type="search" class="form-control" placeholder="Cari Data Barang"
            aria-label="Cari Data Barang" aria-describedby="addon-wrapping">
        </div>
        <table id="" class="display w-100">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Bangunan</th>
                    <th>Lokasi Utama</th>
                    <th>Lokasi Sekunder</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $tampil_barang_gereja = "select * from barang_gereja where nama_lokasi_utama='$nm'";
                    $tampil_barang_gereja_query = mysqli_query($connect,$tampil_barang_gereja);
                    while($tampil_barang_gereja_hasil = mysqli_fetch_assoc($tampil_barang_gereja_query))
                    {
                        $id = $tampil_barang_gereja_hasil['id_barang'];
                        $nm = $tampil_barang_gereja_hasil['nama_barang'];
                        $jml = $tampil_barang_gereja_hasil['jumlah'];
                        $knd = $tampil_barang_gereja_hasil['kondisi'];
                        $ket = $tampil_barang_gereja_hasil['keterangan_kondisi'];
                        $nm_bangunan = $tampil_barang_gereja_hasil['nama_bangunan'];
                        $nm_loc = $tampil_barang_gereja_hasil['nama_lokasi_utama'];
                        $nm_los = $tampil_barang_gereja_hasil['nama_lokasi_sekunder'];
                ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $nm;?></td>
                    <td><?php echo $jml;?></td>
                    <td><?php echo $knd;?></td>
                    <td><?php echo $ket;?></td>
                    <td><?php echo $nm_bangunan;?></td>
                    <td><?php echo $nm_loc;?></td>
                    <td><?php echo $nm_los;?></td>
                </tr>
                <?php
                    }
                    mysqli_free_result($tampil_barang_gereja_query);            
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Bangunan</th>
                    <th>Lokasi Utama</th>
                    <th>Lokasi Sekunder</th>
                </tr>
            </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
            <i class="fa-solid fa-circle-xmark me-1"></i>
            <span>Tutup</span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="laporanlokasisekunder<?php echo $id; ?>" tabindex="-1" aria-labelledby="modal-laporan" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content overflow-x-auto">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-laporan">
            Data Laporan - <?php echo $nm; ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="search" id="keyword" class="form-control" placeholder="Cari Data Barang"
              aria-label="Cari Data Barang" aria-describedby="addon-wrapping">
          </div>
        </form>
        <div class="container p-0" id="result-table">
          <table id="" class="display w-100">
              <thead>
                  <tr>
                      <th>ID Barang</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Kondisi</th>
                      <th>Keterangan</th>
                      <th>Bangunan</th>
                      <th>Lokasi Utama</th>
                      <th>Lokasi Sekunder</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      $tampil_barang_gereja = "select * from barang_gereja where nama_lokasi_sekunder='$nm'";
                      $tampil_barang_gereja_query = mysqli_query($connect,$tampil_barang_gereja);
                      while($tampil_barang_gereja_hasil = mysqli_fetch_assoc($tampil_barang_gereja_query))
                      {
                          $id = $tampil_barang_gereja_hasil['id_barang'];
                          $nm = $tampil_barang_gereja_hasil['nama_barang'];
                          $jml = $tampil_barang_gereja_hasil['jumlah'];
                          $knd = $tampil_barang_gereja_hasil['kondisi'];
                          $ket = $tampil_barang_gereja_hasil['keterangan_kondisi'];
                          $nm_bangunan = $tampil_barang_gereja_hasil['nama_bangunan'];
                          $nm_loc = $tampil_barang_gereja_hasil['nama_lokasi_utama'];
                          $nm_los = $tampil_barang_gereja_hasil['nama_lokasi_sekunder'];
                  ?>
                  <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $nm;?></td>
                      <td><?php echo $jml;?></td>
                      <td><?php echo $knd;?></td>
                      <td><?php echo $ket;?></td>
                      <td><?php echo $nm_bangunan;?></td>
                      <td><?php echo $nm_loc;?></td>
                      <td><?php echo $nm_los;?></td>
                  </tr>
                  <?php
                      }
                      mysqli_free_result($tampil_barang_gereja_query);            
                  ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th>ID Barang</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Kondisi</th>
                      <th>Keterangan</th>
                      <th>Bangunan</th>
                      <th>Lokasi Utama</th>
                      <th>Lokasi Sekunder</th>
                  </tr>
              </tfoot>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger bg-gradient" data-bs-dismiss="modal">
            <i class="fa-solid fa-circle-xmark me-1"></i>
            <span>Tutup</span>
        </button>
      </div>
    </div>
  </div>
</div>