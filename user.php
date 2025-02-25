<?php
    include_once("config.php");
    $result = mysqli_query($mysqli, "SELECT * FROM customer ORDER BY id ASC");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>DAFTAR DATA CUSTOMER</title>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="style.css">
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
            <span class="fa-solid fa-user"></span>
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
                           <!-- Daftar Tabel Data -->
         <h1 style="text-align:center; color:white; text-shadow:2px 3px skyblue;">Tabel Data Customer</h1>
         <div class="btn-add-data">
            <a href="list.php">Tambah Data</a>
         </div>
         <div id="tabel-user">
            <table width="80%" align="center">
                  <tr style="background-color: black; ">
                     <th>ID</th>
                     <th>Nama Lengkap</th>
                     <th>Domisili</th>
                     <th>No Telepon</th>
                     <th>Foto Customer</th>
                     <th>Aksi</th>
                  </tr>
            <?php
               while($customer = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td>". $customer['id']. "</td>";
                  echo "<td>". $customer['nama']. "</td>";
                  echo "<td>". $customer['domisili']. "</td>";
                  echo "<td>". $customer['no_telepon']. "</td>";
                  echo "<td><img src='image/" . $customer['gambar'] . "' alt='Gambar' width='100px' height='100px'></td>";
                  echo "<td><a href='edit.php?id=$customer[id]' class='button-edit'>Edit</a> |
                  <a href='delete.php?id=$customer[id]' class='button-delete'>Delete</a></td></tr>";
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