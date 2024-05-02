<div class="modal fade" id="detaildata<?php echo $id; ?>" tabindex="-1" aria-labelledby="modal-detaildata" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-detaildata">
            <?php
            if(isset($_GET['bangunan'])){
                echo "Detail Data Barang - $nm";
            }
            else if(isset($_GET['lokasi-utama'])){
                echo "Detail Data Barang - $loc";
            }
            else if(isset($_GET['lokasi-sekunder'])){
                echo "Detail Data Barang - $nm";
            }
            ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-sm">
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
            <tbody id="caridata">
                <?php
                    if(isset($_GET['bangunan'])){
                        $tampil_barang_gereja = "select * from barang_gereja where nama_bangunan='$nm'";
                    }
                    else if(isset($_GET['lokasi-utama'])){
                        $tampil_barang_gereja = "select * from barang_gereja where nama_lokasi_utama='$loc'";
                    }
                    else if(isset($_GET['lokasi-sekunder'])){
                        $tampil_barang_gereja = "select * from barang_gereja where nama_lokasi_sekunder='$nm'";
                    }
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