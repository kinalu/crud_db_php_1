<?php
   include_once("config.php");
   if(isset($_POST['submit'])){
      $nama_material = $_POST['nama_material'];
      $stok = $_POST['stok'];
      $harga_satuan = $_POST['harga_satuan'];
      $gambar_material = $_POST['gambar_material'];

      $ambildata = mysqli_query($mysqli, "INSERT INTO material (nama_material, stok, harga_satuan, gambar_material)
      VALUES ('$nama_material', '$stok', '$harga_satuan', '$gambar_material')");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>LIST ORDER</title>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
      <link rel="stylesheet" href="style5.css">
   </head>
   <body style="background-image:url('image/gambar-material-bangunan.jpg');">
     <div class="btn">
         <span class="fas fa-bars"></span>
      </div>
      <nav class="sidebar">
         <div class="text">
            <a href="sidebar.php">Side Menu</a>
         </div>
         <ul>
            <li><a href="user.php">Data Customer</a></li>
            <li class="active"><a href="dashboard.php">Dashboard</a></li>
            <li>
               <a href="#" class="feat-btn">Form
               <span class="fas fa-caret-down first"></span>
               </a>
               <ul class="feat-show">
                  <li><a href="list.php">List</a></li>
                  <li><a href="order.php">Restock</a></li>
                  <li><a href="ordered.php">Order Material</a></li>
               </ul>
            </li>
            <li>
               <a href="#" class="serv-btn">Order
               <span class="fas fa-caret-down second"></span>
               </a>
               <ul class="serv-show">
                  <li><a href="stok.php">Stok Ready</a></li>
                  <li><a href="incoming.php">Incoming Order</a></li>
               </ul>
            </li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="login.php">Logout</a></li>
         </ul>
      </nav>

      <h1 style="text-align:center; color:white; text-shadow:3px 3px brown;">FORM RESTOCK BARANG</h1>
      <div class=form2>
        <form action="order.php" method="POST" name="formulir2">
            <div class="tabel-form2">
            <table width="50%" align="center">
                <div class="isi-form2">
                    <tr>
                        <td>Nama Material</td>
                        <td><input type="text" name="nama_material" width="70%"></td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td><input type="text" name="stok" width="70%"></td>
                    </tr>
                    <tr>
                        <td>Harga Satuan</td>
                        <td><input type="text" name="harga_satuan"  width="70%"></td>
                    </tr>
                    <tr>
                        <td>Gambar Material</td>
                        <td><input type="file" name="gambar_material"  width="70%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" class="btn-submit2"></td>
                    </tr>
                </div>
            </table>
            </div>
      </form>
     </div>

      <script>
         $('.btn').click(function(){
           $(this).toggleClass("click");
           $('.sidebar').toggleClass("show");
         });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn').click(function(){
             $('nav ul .serv-show').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>
   </body>
</html>