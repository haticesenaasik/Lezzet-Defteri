<?php 
include 'ust.php'; 

if (!isset($_GET['id'])) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

$tarif_id = (int)$_GET['id'];

$sorgu = "SELECT tarifler.*, kullanicilar.kullanici_adi 
          FROM tarifler 
          INNER JOIN kullanicilar ON tarifler.user_id = kullanicilar.id 
          WHERE tarifler.id = '$tarif_id'";
$cevap = mysqli_query($baglanti, $sorgu);

if (mysqli_num_rows($cevap) == 0) {
    echo '<div class="alert alert-danger">Tarif bulunamadı!</div>';
    include 'alt.php';
    exit();
}

$tarif = mysqli_fetch_assoc($cevap);
?>

<div class="row justify-content-center mt-3">
    <div class="col-md-10">
        <div class="card recipe-card shadow-sm border-0 p-4 bg-white">
            
            <div class="mb-4 text-center d-flex flex-column justify-content-center align-items-center text-black" 
                 style="background-image: url('kart_detay_bg.jpg'); background-size: cover; background-position: center; height: 220px; border-radius: 20px;">
                <h1 class="fw-bold display-5 mb-1"><?php echo htmlspecialchars($tarif['baslik']); ?></h1>
                <p class="mb-0">👨‍🍳 Hazırlayan Şef: <span style="color: #FF6B35;" class="fw-bold"><?php echo htmlspecialchars($tarif['kullanici_adi']); ?></span></p>
            </div>

            <div class="row text-center mb-4 justify-content-center">
                <div class="col-6 col-md-3 mb-2">
                    <div class="p-3 bg-light rounded-4" style="border-radius: 15px;">
                        <span class="d-block text-muted small">Hazırlanış Süresi</span>
                        <strong class="text-dark">🕒 <?php echo !empty($tarif['sure']) ? htmlspecialchars($tarif['sure']) : '30-40 Dk'; ?></strong>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-2">
                    <div class="p-3 bg-light rounded-4" style="border-radius: 15px;">
                        <span class="d-block text-muted small">Porsiyon Ölçüsü</span>
                        <strong class="text-dark">👥 <?php echo !empty($tarif['kisi']) ? htmlspecialchars($tarif['kisi']) : '4 Kişilik'; ?></strong>
                    </div>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-md-4 mb-4">
                    <div class="p-4 rounded-4" style="background-color: #FAFAFA; border-left: 4px solid #FF6B35; border-radius: 15px;">
                        <h4 class="h5 fw-bold text-dark mb-3 text-uppercase" style="letter-spacing: 0.5px;">📋 Malzemeler</h4>
                        <p class="text-dark" style="line-height: 1.8; font-size: 0.95rem;">
                            <?php echo nl2br(htmlspecialchars($tarif['malzemeler'])); ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="p-2">
                        <h4 class="h5 fw-bold text-dark mb-3 text-uppercase" style="letter-spacing: 0.5px;">👩‍🍳 Nasıl Hazırlanır?</h4>
                        <p class="text-muted" style="line-height: 1.8; font-size: 1rem;">
                            <?php echo nl2br(htmlspecialchars($tarif['yapilis'])); ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4 pt-3 border-top">
                <a href="index.php" class="btn btn-chef-outline px-5 py-2">⬅ Keşfet Sayfasına Geri Dön</a>
            </div>

        </div>
    </div>
</div>

<?php include 'alt.php'; ?>