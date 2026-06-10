<?php 
include 'ust.php'; 
?>

<style>
    .custom-recipe-card {
        border: none !important;
        border-radius: 24px !important;
        background-image: url('kart_bg.jpg');
        background-size: cover;
        background-position: center;
        height: 440px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .custom-recipe-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.22) !important;
    }

    .card-premium-top-content {
        background: rgba(255, 255, 255, 0.96); 
        border-radius: 20px;
        padding: 16px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.06);
        border: 1px solid rgba(255,255,255,0.7);
        margin: 10px 10px 0 10px; 
        margin-bottom: auto;
    }
    
    .card-bottom-space {
        height: 150px; 
    }

    .recipe-title {
        font-weight: 800;
        color: #1A1A1A;
        font-size: 1.1rem;
        line-height: 1.3;
    }
</style>

<div class="row">
    <div class="col-md-12 text-center my-4">
        <h1 class="display-4 fw-bold" style="color: #1A1A1A; letter-spacing: -1px;">Bugün Ne Pişirmek İstersin?</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">Şeflerin elinden çıkma en nefis tarifler sizinle.</p>
        <div class="mx-auto mt-3" style="width: 60px; height: 4px; background-color: #FF6B35; border-radius: 2px;"></div>
    </div>
</div>

<div class="row mt-4">
    <?php
    $sorgu = "SELECT tarifler.*, kullanicilar.kullanici_adi 
              FROM tarifler 
              INNER JOIN kullanicilar ON tarifler.user_id = kullanicilar.id 
              ORDER BY tarifler.id DESC";
    $cevap = mysqli_query($baglanti, $sorgu);

    if (mysqli_num_rows($cevap) == 0) {
        echo '<div class="col-md-12 text-center text-muted my-5"><h5>Henüz hiç tarif paylaşılmamış. İlk şef sen ol!</h5></div>';
    } else {
        while ($satir = mysqli_fetch_assoc($cevap)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card custom-recipe-card shadow-sm d-flex flex-column p-2">
                    
                    <div class="card-premium-top-content">
                        <div class="text-center mb-2">
                            <h4 class="recipe-title mb-1"><?php echo htmlspecialchars($satir['baslik']); ?></h4>
                            <small class="text-muted">👨‍🍳 Şef: <strong style="color: #FF6B35;"><?php echo htmlspecialchars($satir['kullanici_adi']); ?></strong></small>
                        </div>
                        
                        <div class="d-flex justify-content-center gap-3 my-2 py-1 border-top border-bottom" style="border-color: rgba(0,0,0,0.05) !important;">
                            <span class="small text-secondary fw-bold">🕒 <?php echo !empty($satir['sure']) ? htmlspecialchars($satir['sure']) : '30-40 Dk'; ?></span>
                            <span class="small text-secondary fw-bold">👥 <?php echo !empty($satir['kisi']) ? htmlspecialchars($satir['kisi']) : '4 Kişilik'; ?></span>
                        </div>
                        
                        <div class="mt-3">
                            <a href="tarifdetay.php?id=<?php echo $satir['id']; ?>" class="btn btn-chef-outline btn-sm w-100 py-2 mb-2" style="font-size: 0.85rem;">📖 Tarifi Gör</a>
                            
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <?php 
                                $current_user = $_SESSION['user_id'];
                                $current_tarif = $satir['id'];
                                $kontrol = mysqli_query($baglanti, "SELECT * FROM kaydedilenler WHERE user_id = '$current_user' AND tarif_id = '$current_tarif'");
                                ?>
                                <?php if ($satir['user_id'] == $_SESSION['user_id']): ?>
                                    <button class="btn btn-secondary btn-sm w-100 py-2" style="border-radius: 10px; font-size: 0.85rem;" disabled>Kendi Tarifiniz</button>
                                <?php elseif (mysqli_num_rows($kontrol) > 0): ?>
                                    <button class="btn btn-light btn-sm w-100 py-2 text-muted" style="border: 1px solid #DDD; border-radius: 10px; font-size: 0.85rem;" disabled>✓ Deftere Kaydedildi</button>
                                <?php else: ?>
                                    <a href="kaydet_islem.php?id=<?php echo $satir['id']; ?>" class="btn btn-chef btn-sm w-100 py-2 shadow-sm" style="font-size: 0.85rem;">⭐ Deftere Kaydet</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-bottom-space"></div>
                    
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

<?php include 'alt.php'; ?>