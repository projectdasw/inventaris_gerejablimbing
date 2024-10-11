<?php
// DB table to use
$table = 'bangunan';
 
// Table's primary key
$primaryKey = 'id_bangunan';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_bangunan',  'dt' => 0 ),
    array( 'db' => 'nama_bangunan',  'dt' => 1 ),
    array(
        'db' => 'id_bangunan',
        'dt' => 2,
        'formatter' => function($id_bgn){
            return '
                <a class="btn btn-sm btn-success"
                    href="index.php?detaillaporan_bangunan='.$id_bgn.'">
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