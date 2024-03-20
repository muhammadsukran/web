<?php
$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "ujian_web"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>
