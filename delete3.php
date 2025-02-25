<?php
include_once("config.php");

// Cek apakah ID telah diberikan melalui URL
if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];

    // Query untuk menghapus data berdasarkan id_pesanan
    $query = "DELETE FROM pesanan WHERE id_pemesan='$id_pesanan'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'incoming.php'; // Ganti dengan halaman utama setelah delete
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan!');
            window.history.back();
          </script>";
}
?>
