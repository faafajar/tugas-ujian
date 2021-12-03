<?php
//koneksi
include('config/koneksi.php');
 
//ambil data dari form
$id=$_POST['id'];
$nama=$_POST['nama'];
$gender=$_POST['gender'];
$alamat=$_POST['alamat'];
$gaji=$_POST['gaji'];
 
//memasukan data ke database
$query="INSERT INTO pengurus VALUES ('$id', '$nama','$gender', '$alamat', '$gaji')";
$simpan=mysqli_query($conn,$query);
 
?>
<a href="tampil_data.php"> Kembali Untuk lihat Data</a>