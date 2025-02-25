<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "db_uas_lukman";

    $mysqli = mysqli_connect($host, $user, $password, $db);
    if(!$mysqli){
        die("Tidak dapat terhubung ke server: ". mysqli_connect_error());
    }

?>