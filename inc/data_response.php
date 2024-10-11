<?php
    include "connect.php";
    $qry = mysqli_query($connect, "select * from bangunan where nama_bangunan=nama_bangunan");
    $data = array();
    while($row = mysqli_fetch_array($qry)){
        array_push($data, $row);
    }
    echo json_encode($data);
?>

<?php
    include "connect.php";
    $qry = mysqli_query($connect, "select * from lokasi_utama where nama_bangunan=nama_bangunan");
    $data = array();
    while($row = mysqli_fetch_array($qry)){
        array_push($data, $row);
    }
    echo json_encode($data);
?>

<?php
    include "connect.php";
    $qry = mysqli_query($connect, "select * from lokasi_sekunder where nama_bangunan=nama_bangunan");
    $data = array();
    while($row = mysqli_fetch_array($qry)){
        array_push($data, $row);
    }
    echo json_encode($data);
?>