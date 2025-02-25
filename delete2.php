<?php
    include_once("config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    $ambildata = mysqli_query($mysqli, "DELETE FROM material WHERE id_material=$id");
    header("Location: stok.php");
    }

?>