<?php
include_once("config.php");

// Periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id_pemesan = $_GET['id'];

    // Ambil data pesanan berdasarkan ID
    $result = mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_pemesan='$id_pemesan'");
    $pesanan = mysqli_fetch_assoc($result);

    if (!$pesanan) {
        echo "<script>
                alert('Data tidak ditemukan!');
                window.location.href = 'incoming.php';
              </script>";
        exit();
    }
}

// Ambil daftar material untuk dropdown
$material_result = mysqli_query($mysqli, "SELECT * FROM material");
$material_list = [];
while ($material = $material_result->fetch_assoc()) {
    $material_list[$material['id_material']] = $material['nama_material'];
}

// Proses update data setelah form disubmit
if (isset($_POST['update'])) {
    $id_material = $_POST['id_material'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat'];
    $tgl_memesan = $_POST['tgl_memesan'];
    $jmlh_pesan = $_POST['jmlh_pesan'];

    $update_query = "UPDATE pesanan SET 
                        id_material='$id_material', 
                        nama_pemesan='$nama_pemesan', 
                        alamat='$alamat', 
                        tgl_memesan='$tgl_memesan', 
                        jmlh_pesan='$jmlh_pesan' 
                     WHERE id_pemesan='$id_pemesan'";

    if (mysqli_query($mysqli, $update_query)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href = 'incoming.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui data!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="style8.css">
</head>
<body>
    <h2>Edit Pesanan</h2>
    <form method="post">
        <label>Jenis Material:</label>
        <select name="id_material" required>
            <?php
            foreach ($material_list as $id => $nama) {
                $selected = ($id == $pesanan['id_material']) ? "selected" : "";
                echo "<option value='$id' $selected>$nama</option>";
            }
            ?>
        </select><br>

        <label>Nama Pemesan:</label>
        <input type="text" name="nama_pemesan" value="<?= $pesanan['nama_pemesan']; ?>" required><br>

        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= $pesanan['alamat']; ?>" required><br>

        <label>Tanggal Memesan:</label>
        <input type="date" name="tgl_memesan" value="<?= $pesanan['tgl_memesan']; ?>" required><br>

        <label>Jumlah Pesan:</label>
        <input type="number" name="jmlh_pesan" value="<?= $pesanan['jmlh_pesan']; ?>" required><br>

        <input type="submit" name="update" value="Update">
        <a href="incoming.php">Batal</a>
    </form>
</body>
</html>
