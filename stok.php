<?php
   include_once("config.php");
   $ambildata = mysqli_query($mysqli, "SELECT * FROM material ORDER BY id_material ASC");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>MATERIAL WEB SHOP</title>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
      <link rel="stylesheet" href="style3.css">
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
      <h1 style="text-align:center; color:white; text-shadow:2px 3px red;">Tabel Restock Barang</h1>
      <div class="btn-add-tbl">
            <a href="order.php">Tambah Stok</a>
      </div>
      <div class="tabel-stok">
         <table width="80%" border="1">
         <tr style="background-color:red; height:40px;">
               <th>ID</th>
               <th>Nama Material</th>
               <th>Stok</th>
               <th>Harga Satuan</th>
               <th>Gambar Material</th>
               <th>Aksi</th>
         </tr>
         <?php
         while($material = mysqli_fetch_array($ambildata)){
               echo "<tr>";
               echo "<td>". $material['id_material']. "</td>";
               echo "<td>". $material['nama_material']. "</td>";
               echo "<td>". $material['stok']. "</td>";
               echo "<td>". $material['harga_satuan']. "</td>";
               echo "<td><img src='image/" . $material['gambar_material'] . "' alt='Gambar' width='100px' height='100px' style='margin-top:5px;'></td>";
               echo "<td><a href='edit2.php?id=$material[id_material]' class='button-edit'>Edit</a> |
                     <a href='delete2.php?id=$material[id_material]' class='button-delete'>Delete</a></td>";
               echo "</tr>";
         }
         ?>
         </table>
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