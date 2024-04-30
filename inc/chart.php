<?php
    include "connect.php";
    $functionName = htmlspecialchars($_GET['functionName']);

    function getBarangBangunan(){
        global $connect;

        $data = [];
        $query = mysqli_query($connect, "select * from bangunan");

        while($row = mysqli_fetch_assoc(($query))){
            $data[] = $row;
        }

        echo json_encode($data);
    }

    switch ($functionName) {
        case 'getBarangBangunan':
            getBarangBangunan();
            break;
        
        default:
            # code...
            break;
    }
?>