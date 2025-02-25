<?php
   include_once("config.php");
   if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $domisili = $_POST['domisili'];
    $no_telepon = $_POST['no_telepon'];
    $gambar = $_POST['gambar'];

    $result = mysqli_query($mysqli, "UPDATE customer SET nama='$nama', domisili = '$domisili', no_telepon = '$no_telepon',
    gambar = '$gambar' WHERE id=$id");
    header("Location: user.php");
   }

   $id = $_GET['id'];
   $result = mysqli_query($mysqli, "SELECT * FROM customer WHERE id=$id");
    while($customer = mysqli_fetch_array($result)){
        $nama = $customer['nama'];
        $domisili = $customer['domisili'];
        $no_telepon = $customer['no_telepon'];
        $gambar = $customer['gambar'];
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>ISI FORM</title>
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
      <div class="top-judul-form">DAFTAR DATA</div>
      <form action="edit.php" method="POST" name="formulir1">
        <div class="tabel-form">
        <table>
            <div id="isi-tabel-form">
                <tr>
                    <td>Nama Lengkap</td>
                    <td><input type="text" name="nama" style="width:70%;" value="<?php echo $nama; ?>"></td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td><input type="text" name="domisili" style="width:70%;" value="<?php echo $domisili; ?>"></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td><input type="text" name="no_telepon" style="width:70%;" value="<?php echo $no_telepon; ?>"></td>
                </tr>
                <tr>
                    <td>Upload Gambar</td>
                    <td><input type="file" name="gambar" style="width:70%;" value="<?php echo $gambar; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                        <input type="submit" name="update" class="btn-submit">
                    </td>
                </tr>
            </div>
        </table>
        </div>
      </form>
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