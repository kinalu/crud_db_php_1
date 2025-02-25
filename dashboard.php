<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>MATERIAL WEB SHOP</title>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="style2.css">
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
      <div class="wrapper-text">
         <h1 id="judul">Dashboard</h1>
         <div class="isi-dasbor" style="color:white; text-align:center;">
               Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
               Iusto, quaerat laboriosam facilis nulla aspernatur ipsum accusantium dolores ut veritatis ullam <br>
               delectus debitis eveniet, magni quia ratione consequatur recusandaequi Commodi.</div>
         <div id="bg-content">
               <div><img src="image/GAMBAR-PEKERJA-removebg-preview.png"></div>
         </div>
         <span style="display:flex; justify-content:center; color:white; margin-top:5px; text-shadow:0 3px red;">@Copyright By Lukman id.com</span>
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