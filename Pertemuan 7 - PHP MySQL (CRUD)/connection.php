<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "kuliah";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Cek koneksi
if($conn === false){
    die("ERROR: Koneksi gagal! " . mysqli_connect_error());
}
?>