<?php
   include_once("config.php");

   $material_result = mysqli_query($mysqli, "SELECT * FROM material WHERE stok > 0 ORDER BY id_material ASC");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>MATERIAL WEB SHOP</title>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
      <link rel="stylesheet" href="style7.css">
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
      <h1 style="color:white; text-align:center;">FORM PEMESANAN MATERIAL</h1><br>
      <div class="form3">
      <form action="process-ordered.php" method="POST" name="form_pesanan">
         <div class="tabel-form3">
        <table>
         <div class="isi-form3">
            <tr>
               <td>Nama Pemesan</td>
               <td><input type="text" name="nama_pemesan" required></td>
            </tr>
            <tr>
               <td>Alamat</td>
               <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
               <td>Tanggal Order</td>
               <td><input type="date" name="tgl_memesan" required></td>
            </tr>
            <tr>
               <td><label for="material_pilih">Jenis Material</label></td>
               <td><select name="id_material[]" id="material_pilih">
                  <option value="">----</option>
                  <?php
                     $jenis = mysqli_query($mysqli, "SELECT * FROM material") or die (mysqli_error($mysqli));
                     while($key = mysqli_fetch_array($jenis)){
                        echo "<option value=$key[id_material]> Stok: $key[stok] | $key[nama_material]</option>";
                     }
                  ?>
               </select></td>
            </tr>
            <tr>
               <td>Jumlah Pesanan</td>
               <td><input type="number" name="jmlh_pesan[]" required></td>
            </tr>
            <tr>
               <td></td>
               <td><input type="submit" name="order" class="btn-submit2"></td>
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