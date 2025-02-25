<?php
   include_once("config.php");

   // Mendapatkan data pesanan
   $pesanan_result = mysqli_query($mysqli, "SELECT * FROM pesanan ORDER BY id_pemesan ASC");

   // Mendapatkan data material dan menyimpan dalam array
   $material_result = mysqli_query($mysqli, "SELECT * FROM material");
   $material_list = [];
   while ($material = $material_result->fetch_assoc()) {
      $material_list[$material['id_material']] = $material['nama_material'];
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>MATERIAL WEB SHOP</title>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
      <link rel="stylesheet" href="style8.css">
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
      <h1 style="color:white; text-align:center; ">TABEL INCOMING ORDER</h1>
      <div class="btn-add-tbl">
         <a href="ordered.php">Tambah Data</a><br>
      </div>
      <div class="btn-excelPDF">
      <div class="btn-excel">
         <a href="excel.php">Excel</a>
      </div>
      <div class="btn-pdf">
         <a href="pdf.php">PDF</a>
      </div>
      </div>
      <div class="tabel-incom">
      <table width="80%" align="center" border="1">
        <tr style="background-color:yellow; height:40px;">
            <th>ID</th>
            <th>Jenis Material</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>Tanggal Memesan</th>
            <th>Jumlah Pesan</th>
            <th>Aksi</th>
        </tr>
         <?php
         while ($pesanan = mysqli_fetch_array($pesanan_result)) {
               echo "<tr>";
               echo "<td>" . $pesanan['id_pemesan'] . "</td>";
               echo "<td>" . (isset($material_list[$pesanan['id_material']]) ? $material_list[$pesanan['id_material']] : '') . "</td>";
               echo "<td>" . $pesanan['nama_pemesan'] . "</td>";
               echo "<td>" . $pesanan['alamat'] . "</td>";
               echo "<td>" . $pesanan['tgl_memesan'] . "</td>";
               echo "<td>" . $pesanan['jmlh_pesan'] . "</td>";
               echo "<td><a href='edit3.php?id=" . $pesanan['id_pemesan'] . "' class='fas fa-edit' class='button-edit'></a> | 
               <a href='delete3.php?id=" . $pesanan['id_pemesan'] . "' class='fas fa-trash-alt' class='button-delete'></a></td>";
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
