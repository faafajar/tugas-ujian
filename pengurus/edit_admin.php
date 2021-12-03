<?php
//koneksi
include('config/koneksi.php');
 
$id_admin=$_GET['id_admin']; //ambil ID
 
$query="SELECT * FROM admin WHERE id_admin = '$id_admin'";
$data=mysqli_query($conn,$query);
 
//menampung hasil
$row=mysqli_fetch_assoc($data);
 
?>
<h1>Ubah Data</h1>
 
<form method="post" action="ubah_admin.php">
    <p>id_admin <input type="number" name="id_admin" required="required" value="<?php echo $row['id_admin']; ?>"> </p>
    <p>unsername <input type="text" name="username" value="<?php echo $row['username']; ?>"> </p>
    <p>password <input type="password"  name="password"><?php echo $row['password']; ?></textarea> </p>
    <p>
        <button type="submit">Ubah</button>
        <button type="reset">Batal</button>
    </p>
</form>
?>