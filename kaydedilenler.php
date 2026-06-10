<?php 
include 'ust.php'; 

if (!isset($_SESSION['user_id'])) {
    echo '<div class="alert alert-danger" style="border-radius: 12px;">Bu sayfayı görebilmek için önce giriş yapmalısınız!</div>';
    echo '<script>setTimeout(function(){ window.location.href="giris.php"; }, 2000);</script>';
    include 'alt.php';
    exit();
}

$current_user = $_SESSION['user_id'];
?>

<div class="row">
    <div class="col-md-12 text-center my-4">
        <h1 class="fw-bold" style="color: #1A1A1A; letter-spacing: -1px;">⭐ Gurme Tarif Defterim</h1>
        <p class="text-muted">Diğer şeflerin paylaştığı ve senin defterine hayranlıkla not ettiğin özel lezzetler:</p>
        <div class="mx-auto mt-2" style="width: 40px; height: 3px; background-color: #FF6B35; border-radius: 2px;"></div>
    </div>
</div>

<div class="row mt-4">
    <?php
    $sorgu = "SELECT tarifler.*, kullanicilar.kullanici_adi AS usta_adi 
              FROM kaydedilenler 
              INNER JOIN tarifler ON kaydedilenler.tarif_id = tarifler.id 
              INNER JOIN kullanicilar ON tarifler.user_id = kullanicilar.id 
              WHERE kaydedilenler.user_id = '$current_user'
              ORDER BY kaydedilenler.id DESC";
              
    $cevap = mysqli_query($baglanti, $sorgu);

    if (mysqli_num_rows($cevap) == 0) {
        echo '<div class="col-md-12 text-center text-muted my-5">
                <div class="p-5 recipe-card shadow-sm bg-white text-center">
                    <h5 class="text-secondary mb-3">Defteriniz henüz bomboş görünüyor.</h5>
                    <a href="index.php" class="btn btn-chef btn-sm">Tarifleri Keşfet</a>
                </div>
              </div>';
    } else {
        while ($satir = mysqli_fetch_assoc($cevap)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 recipe-card shadow-sm border-0">
                    <div class="card-body d-flex flex-column p-4">
                        <h3 class="h5 fw-bold mb-1" style="color: #1A1A1A; line-height: 1.3;">
                            <?php echo htmlspecialchars($satir['baslik']); ?>
                        </h3>
                        <span class="badge align-self-start mb-3" style="background-color: rgba(255, 107, 53, 0.1); color: #FF6B35; font-weight: 600; border-radius: 6px;">
                            👨‍🍳 Şef: <?php echo htmlspecialchars($satir['usta_adi']); ?>
                        </span>
                        
                        <div class="bg-light p-3 border-0 rounded-4 mb-3" style="border-radius: 12px; background-color: #FAFAFA !important;">
                            <p class="mb-1 small text-uppercase fw-bold text-secondary" style="letter-spacing: 0.5px;">Malzemeler</p>
                            <p class="card-text text-dark small mb-0" style="line-height: 1.5;">
                                <?php echo nl2br(htmlspecialchars($satir['malzemeler'])); ?>
                            </p>
                        </div>
                        
                        <p class="mb-1 small text-uppercase fw-bold text-secondary" style="letter-spacing: 0.5px;">Hazırlanışı</p>
                        <p class="card-text text-muted small flex-grow-1" style="line-height: 1.6;">
                            <?php echo nl2br(htmlspecialchars($satir['yapilis'])); ?>
                        </p>
                        
                        <div class="border-top-0 pt-3 mt-3" style="border-top: 1px solid #F0F0F0 !important;">
                            <a href="kaydet_sil.php?id=<?php echo $satir['id']; ?>" class="btn btn-sm btn-light text-danger w-100 py-2 fw-bold" style="border-radius: 10px; border: 1px solid #F0F0F0;">❌ Defterden Çıkar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

<?php 
include 'alt.php'; 
?>