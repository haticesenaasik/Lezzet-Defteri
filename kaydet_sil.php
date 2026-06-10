<?php
session_start();
include 'baglan.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$tarif_id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

$sorgu = "DELETE FROM kaydedilenler WHERE tarif_id = '$tarif_id' AND user_id = '$user_id'";
mysqli_query($baglanti, $sorgu);

header("Location: kaydedilenler.php");
exit();
?>