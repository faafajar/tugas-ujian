<?php
//koneksi
require_once('config/koneksi.php');
 
$id_admin=$_GET['id_admin']; //ambil ID
 
$query="DELETE FROM admin WHERE id_admin = '$id_admin'";
$data=mysqli_query($conn,$query);

?>
<a href="tampil_admin.php"> Kembali Untuk lihat Data</a>