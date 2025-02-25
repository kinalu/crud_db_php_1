<?php
 include_once("config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="text-align:center; ">TABEL INCOMING ORDER</h1>
<table width="90%" align="center" border="1">
        <tr style="background-color:yellow; height:40px;">
            <th>ID</th>
            <th>Jenis Material</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>Tanggal Memesan</th>
            <th>Jumlah Pesan</th>
        </tr>
         <?php
        $pesanan_result = mysqli_query($mysqli, "SELECT * FROM pesanan ORDER BY id_pemesan ASC");
        $material_result = mysqli_query($mysqli, "SELECT * FROM material");
        $material_list = [];
        while ($material = $material_result->fetch_assoc()) {
           $material_list[$material['id_material']] = $material['nama_material'];
        }
         while ($pesanan = mysqli_fetch_array($pesanan_result)) {
               echo "<tr>";
               echo "<td>" . $pesanan['id_pemesan'] . "</td>";
               echo "<td>" . (isset($material_list[$pesanan['id_material']]) ? $material_list[$pesanan['id_material']] : '') . "</td>";
               echo "<td>" . $pesanan['nama_pemesan'] . "</td>";
               echo "<td>" . $pesanan['alamat'] . "</td>";
               echo "<td>" . $pesanan['tgl_memesan'] . "</td>";
               echo "<td>" . $pesanan['jmlh_pesan'] . "</td>";
               echo "</tr>";
            }
         ?>
      </table>
      </div>
      <br>
      <script>
        window.print();
    </script>
</body>
</html>