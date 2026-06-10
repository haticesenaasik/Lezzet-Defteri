<?php 
include 'ust.php'; 

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

$tarif_id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

$bul_sorgu = "SELECT * FROM tarifler WHERE id = '$tarif_id' AND user_id = '$user_id'";
$bul_cevap = mysqli_query($baglanti, $bul_sorgu);

if (mysqli_num_rows($bul_cevap) == 0) {
    echo '<div class="alert alert-danger">Tarif bulunamadı veya yetkiniz yok!</div>';
    include 'alt.php';
    exit();
}

$tarif_verisi = mysqli_fetch_assoc($bul_cevap);

if (isset($_POST['tarif_guncelle_buton'])) {
    $baslik = mysqli_real_escape_string($baglanti, $_POST['baslik']);
    $sure = mysqli_real_escape_string($baglanti, $_POST['sure']);
    $kisi = mysqli_real_escape_string($baglanti, $_POST['kisi']);
    $malzemeler = mysqli_real_escape_string($baglanti, $_POST['malzemeler']);
    $yapilis = mysqli_real_escape_string($baglanti, $_POST['yapilis']);

    $guncelle_sorgu = "UPDATE tarifler SET baslik='$baslik', sure='$sure', kisi='$kisi', malzemeler='$malzemeler', yapilis='$yapilis' WHERE id='$tarif_id' AND user_id='$user_id'";
    if (mysqli_query($baglanti, $guncelle_sorgu)) {
        echo '<div class="alert alert-success">Tarif başarıyla güncellendi!</div>';
        echo '<script>setTimeout(function(){ window.location.href="tariflerim.php"; }, 1500);</script>';
    } else {
        echo '<div class="alert alert-danger">Hata: ' . mysqli_error($baglanti) . '</div>';
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card recipe-card shadow-sm p-4">
            <div class="card-body">
                <h2 class="fw-bold mb-1" style="color: #1A1A1A;">Tarifi Düzenle</h2>
                <div class="mb-4" style="width: 50px; height: 3px; background-color: #FF6B35; border-radius: 2px;"></div>
                
                <form action="tarifduzenle.php?id=<?php echo $tarif_id; ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Yemek Adı</label>
                        <input type="text" name="baslik" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" value="<?php echo htmlspecialchars($tarif_verisi['baslik']); ?>" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-secondary">Süre</label>
                            <input type="text" name="sure" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" value="<?php echo htmlspecialchars($tarif_verisi['sure']); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-secondary">Kişi Sayısı</label>
                            <input type="text" name="kisi" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" value="<?php echo htmlspecialchars($tarif_verisi['kisi']); ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Gerekli Malzemeler</label>
                        <textarea name="malzemeler" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" rows="4" required><?php echo htmlspecialchars($tarif_verisi['malzemeler']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Tarifin Yapılışı</label>
                        <textarea name="yapilis" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" rows="5" required><?php echo htmlspecialchars($tarif_verisi['yapilis']); ?></textarea>
                    </div>
                    <button type="submit" name="tarif_guncelle_buton" class="btn btn-chef w-100 py-3 shadow-sm">Değişiklikleri Kaydet ✨</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'alt.php'; ?>