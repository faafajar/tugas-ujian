<?php
if(!isset($_SESSION)) {
    session_start();
}
 
//jika ada orang yang masuk tanpa login
if(empty($_SESSION['username'])) {
    header("location: login.php");
}
//memanggil file koneksi
include('config/koneksi.php');
 
//ambil data dari database
$query="SELECT * FROM admin";
 
$data=mysqli_query($conn,$query);
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Data Pengurus</title>
    <style type="text/css">
        body{
            background-color: #F9EAE1;
        }
        h1{
            font-family: sans-serif;
            text-align: center;
        }
        input{
            width: 250px;
            height: 30px;
            font-size: 20px;
            background-color: #F5E9E2;
            
        }
        button{
           position:relative;
           left: 45em;
           background: transparent;
           height: 30px;
           width: 80px;
        }
    </style>
</head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
 
<div class="card" style="width: 85rem; ">
  <div class="card-header">
    Data Pengurus
  </div>
</div>
<h1>Data Pengurus</h1>
<p>
    <a href="logout.php">Logout</a>
</p>  
    <div>
        <a href="logout.php" style=" position: relative;left: 100px; text-decoration: none; "class="btn btn-primary">Logout</a>
    </div>
<table border="1"  style="position:relative;left: 30px; width: 82em;" >
    <tr>
        <th>id_admin</th>
        <th>unsername</th>
        <th>password</th>
    </tr>
<?php
 while($row=mysqli_fetch_assoc($data)) {
    ?>
        <tr>
            <td><?php echo $row['id_admin']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
                <a href="edit_admin.php?id_admin=<?php echo $row['id_admin']; ?>" class="btn btn-primary" >Edit</a> | 
                <a href="delete_admin.php?id_admin=<?php echo $row['id_admin']; ?>" class="btn btn-danger" onclick="return confirm('Yakin nih?')">Delete</a>
     
            </td>
        </tr>
    <?php 
 }
?>
</table>
<hr>
 
<h1>Input Data</h1>
 
<form method="post" action="simpan_admin.php" style="margin-left: 0.5%;margin-top: 1%;">
    <p style="position:relative;left: 632px; width: 90px;">id_admin <input type="text" name="id_admin" required="required" class="id"> </p>
    <p style="position:relative;left: 632px; width: 90px;">username <input type="text" name="username" class="uid"> </p>
    <p style="position:relative;left: 632px; width: 90px;">password <input type="password" name="password" class="pw"></textarea> </p>
    <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary">Batal</button>
    </p>
</form>
</body>
</html>
