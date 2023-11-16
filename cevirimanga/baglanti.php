<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "cevirimanga";

    $baglanti = new mysqli($host, $username, $password, $database);

    if($baglanti->connect_error){
        die("Database bağlantısı başarısız: ".$baglanti->connect_error);
    }
?>