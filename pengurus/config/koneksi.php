<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$database = "pengurus";
 
// membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password,$database);
 
// cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi Error: " . mysqli_connect_error());
}
echo "Koneksi Berhasil";
 
?>