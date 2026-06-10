<?php
session_start();
include 'baglan.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: giris.php");
    exit();
}

if (isset($_GET['id'])) {
    $tarif_id = (int)$_GET['id'];
    $user_id = $_SESSION['user_id'];

    $kontrol_sorgu = "SELECT * FROM kaydedilenler WHERE user_id = '$user_id' AND tarif_id = '$tarif_id'";
    $kontrol_cevap = mysqli_query($baglanti, $kontrol_sorgu);

    if (mysqli_num_rows($kontrol_cevap) == 0) {
        $ekle_sorgu = "INSERT INTO kaydedilenler (user_id, tarif_id) VALUES ('$user_id', '$tarif_id')";
        mysqli_query($baglanti, $ekle_sorgu);
    }
    
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>