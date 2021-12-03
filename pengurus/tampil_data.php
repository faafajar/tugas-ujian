<?php
if(!isset($_SESSION)) {
    session_start();
}

//jika ada orang yang masuk tanpa login
if(empty($_SESSION['username'])) {
    header("location: login.php");
}
 
include('config/koneksi.php');
 
//ambil data dari database
$query="SELECT * FROM pengurus ORDER BY id ASC";
 
$data=mysqli_query($conn,$query);
?>
 
<!DOCTYPE html>
<html style="margin: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Data Pengurus</title>
    <style type="text/css">
        *{
            font-family: verdana;
        }
        
        form{
            height: 400px;
        }
    </style>
</head>
<body style="margin:auto;overflow-x: hidden;">
 
    <div class="card" style="width: 1300;margin: auto;background-color: #FEF9EF;">
      <div class="card-header" style="background-color: #FFC1CF;color: white">
      <h1 align="center" style="position:relative;left: 30px;">Data pengurus</h1>
      <h1>Data Pengurus</h1>
    <p>
        <a href="logout.php" style="width: 6rem;text-decoration: none;color: #9C528B">Logout</a>
    </p>
      </div>
        <table style="margin-left: 0.5%;margin-top: 1%;border: 2px solid; border-color: #56203D">
        <tr>
            <th style="color:#9C528B">ID</th>
            <th style="color:#9C528B">Nama</th>
            <th style="color:#9C528B">Gender</th>
            <th style="color:#9C528B">Alamat</th>
            <th style="color:#9C528B">Gaji</th>

        </tr>
    <?php
     while($row=mysqli_fetch_assoc($data)) {
    ?>
        <tr>
            <td style="color:#56203D"><?php echo $row['id']; ?></td>
            <td style="color:#56203D"><?php echo $row['nama']; ?></td>
            <td style="color:#56203D"><?php echo $row['gender']; ?></td>
            <td style="color:#56203D"><?php echo $row['alamat']; ?></td>
            <td style="color:#56203D"><?php echo $row['gaji']; ?></td>
            <td> <a href="edit_data.php?id=<?php echo $row['id']; ?>"div class="badge" style="width: 6rem; background-color: #E2A0FF;text-decoration: none;;color: #9C528B">
                </div>Edit</a> 
                <a href="hapus_data.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin nih?') "div class="badge  text-wrap" style="width: 6rem;background-color: #9C528B;text-decoration: none;color:#E2A0FF">Delete</a>
            </td>
        </tr>
    <?php 
     }
    ?>
    </table>
    <br>
    <br>
    <div class="card" style="width: 1300;">
      <div class="card-header" style="background-color: #FFC1CF; color: white">
      <h1 style="text-align: center;position: relative;left: 30px">Input Data</h1>
      </div>
     
        <form method="post" action="simpan_data.php" style="background-color: #FEF9EF">
            <p style ="color:#56203D;position: relative; left: 500px;">ID <input type="text" name="id" required="required" style="position: relative;left:50px;margin-top: 2%;width: 300px;"> </p>
            <p style="color:#56203D;position: relative; left: 500px;">Nama <input type="text" name="nama" style="position: relative; left: 25px;width: 300px;"> </p>
            <p style="color:#56203D;position: relative; left: 500px;">Gender <select type="text" name="gender" style="position: relative;left: 15px;color:#56203D">
                <option style="color:#56203D" value="l">Laki-Laki</option>
                <option style="color:#56203D" value="p">Perempuan</option>
            </select></p>
            <p style="color:#56203D;position: relative; left: 500px;">Alamat <input type="text" name="alamat" style="width: 300px;height:;position: relative; left:17px"> </p>
            <p style="color:#56203D;position: relative; left: 500px;">Gaji <input type="number" name="gaji"style="width: 300px;position: relative; left: 40px"></p>
                <button type="reset"  style="position: relative;left: 570px;background-color:#E2A0FF;color: white; ;border-color: white ;font-family: sans-serif; border-radius: 3px; height:40px; width:150px; box-sizing: border-box;">Batal</button>
                <button type="submit" style="position: relative;left: 570px;font: sans-serif; background-color: #E2A0FF;color: white; ;border-color: white; border-radius: 3px; height:40px; width:150px;">Simpan</button>
                    
            </p>
        </form>
    
    </div>
</body>
</html>