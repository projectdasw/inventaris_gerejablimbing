<?php
// DB table to use
$table = 'lokasi_utama';
 
// Table's primary key
$primaryKey = 'id_lokasi';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_lokasi', 'dt' => 0 ),
    array( 'db' => 'nama_lokasi_utama',  'dt' => 1 ),
    array( 'db' => 'nama_bangunan',  'dt' => 2 ),
    array(
        'db' => 'id_lokasi',
        'dt' => 3,
        'formatter' => function($id_loc){
            return '
                <a class="badge btn btn-primary mb-1"
                    href="index.php?detail_lokasi_utama='.$id_loc.'">
                    <i class="fa-solid fa-circle-info"></i>
                    <span style="font-size: 12px;">Detail</span>
                </a>
                <a class="badge btn btn-success mb-1"
                    href="index.php?ubah_lokasiutama='.$id_loc.'">
                    <i class="fa-solid fa-pencil"></i>
                    <span style="font-size: 12px;">Edit</span>
                </a>
                <a class="badge btn btn-danger" mb-1
                    href="../inc/process.php?hapus_lokasi_utama='.$id_loc.'"
                    onclick="confirmDelete(event)">
                    <i class="fa-solid fa-trash-can"></i>
                    <span style="font-size: 12px;">Hapus</span>
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