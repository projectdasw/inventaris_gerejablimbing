<?php
// DB table to use
$table = 'detail_kurang_jumlah';
 
// Table's primary key
$primaryKey = 'id_barang';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_barang', 'dt' => 0 ),
    array( 'db' => 'nama_barang',  'dt' => 1 ),
    array( 'db' => 'nama_bangunan',  'dt' => 2 ),
    array( 'db' => 'nama_lokasi_utama',  'dt' => 3 ),
    array( 'db' => 'nama_lokasi_sekunder',  'dt' => 4 ),
    array( 'db' => 'jumlah_kurang',  'dt' => 5 ),
    array( 'db' => 'deskripsi',  'dt' => 6 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'parogorg_datainventaris',
    'host' => '127.0.0.1'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);

$output = array(
    'draw' => intval($_POST['draw']),
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $output )
);