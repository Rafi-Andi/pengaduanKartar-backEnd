<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pengaduan";

$db = new mysqli($hostname, $username, $password, $dbname);

if ($db->connect_error) {
    echo"gagal terhubung";
    die("Gagal terhubung db");
} 

?>