<?php
$host = "localhost";
$user = "";
$pass = ""; 
$db_name = "";

$baglanti = mysqli_connect($host, $user, $pass, $db_name);

if (!$baglanti) {
    die("Veri tabanına bağlanılamadı: " . mysqli_connect_error());
}

mysqli_set_charset($baglanti, "utf8");
?>