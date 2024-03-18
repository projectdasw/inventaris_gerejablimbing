<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "parogorg_datainventaris";
	$connect = mysqli_connect($host,$username,$password,$database);
	
	if(!$connect) {
		die("Connection Failed!");
	}
?>
