<?php
session_start();
include 'baglan.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$tarif_id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

$sorgu = "DELETE FROM tarifler WHERE id = '$tarif_id' AND user_id = '$user_id'";
$cevap = mysqli_query($baglanti, $sorgu);

if ($cevap) {
    $sil_kaydedilen = "DELETE FROM kaydedilenler WHERE tarif_id = '$tarif_id'";
    mysqli_query($baglanti, $sil_kaydedilen);
}

header("Location: tariflerim.php");
exit();
?>