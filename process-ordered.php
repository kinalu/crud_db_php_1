<?php
include_once("config.php");

if (empty($_POST['id_material'])) {
    die("Tidak ada material yang dipilih.");
}

$id_material_order = $_POST['id_material'];
$jmlh_pesan_order = $_POST['jmlh_pesan'];
$nama_pemesan = $_POST['nama_pemesan'];
$alamat = $_POST['alamat'];
$tgl_memesan = $_POST['tgl_memesan'];

foreach ($id_material_order as $index => $id_material) {
    $jmlh_pesan = (int) $jmlh_pesan_order[$index];

    // Ambil stok material dari database
    $stok_material_query = "SELECT stok FROM material WHERE id_material='$id_material'";
    $stok_result = mysqli_query($mysqli, $stok_material_query);
    $stok = mysqli_fetch_assoc($stok_result)['stok'];

    if ($jmlh_pesan > $stok) {
        die("Jumlah pesanan untuk ID Material $id_material melebihi stok yang tersedia.");
    }

    // Insert ke tabel pesanan
    $query = "INSERT INTO pesanan (id_material, nama_pemesan, alamat, tgl_memesan, jmlh_pesan)
              VALUES('$id_material', '$nama_pemesan', '$alamat', '$tgl_memesan', '$jmlh_pesan')";
    mysqli_query($mysqli, $query);

    // Update stok di tabel material
    $update_query = "UPDATE material SET stok = stok - $jmlh_pesan WHERE id_material='$id_material'";
    mysqli_query($mysqli, $update_query);
}
header("Location: incoming.php");
echo "<script>alert('Pesanan Berhasil Masuk')</script>";
?>
