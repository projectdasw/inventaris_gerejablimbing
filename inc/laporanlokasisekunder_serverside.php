<?php
// DB table to use
$table = 'lokasi_sekunder';
 
// Table's primary key
$primaryKey = 'id_lokasi_sekunder';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_lokasi_sekunder',  'dt' => 0 ),
    array( 'db' => 'nama_lokasi_sekunder',  'dt' => 1 ),
    array( 'db' => 'nama_lokasi_utama',  'dt' => 2 ),
    array( 'db' => 'nama_bangunan',  'dt' => 3 ),
    array(
        'db' => 'id_lokasi_sekunder',
        'dt' => 4,
        'formatter' => function($id_los){
            return '
                <a class="btn btn-sm btn-success"
                    href="index.php?detaillaporan_lokasisekunder='.$id_los.'">
                    <i class="fa-solid fa-circle-info me-1"></i>
                    Lihat Detail Data
                </a>
            ';
        }
    ),
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