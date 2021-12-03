<?php
//koneksi
include('config/koneksi.php');
 
//ambil data dari form
$id_admin=$_POST["id_admin"];
$username=$_POST["username"];
$password=md5($_POST["password"]);
 
//memasukan data ke database
$query="UPDATE admin SET username = '$username', password = '$password' WHERE id_admin = '$id_admin' ";
$ubah=mysqli_query($conn,$query);



?>
<a href="tampil_admin.php"> Kembali Untuk lihat Data</a>