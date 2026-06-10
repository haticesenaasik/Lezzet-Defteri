<?php 
include 'ust.php'; 

if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="giris.php";</script>';
    exit();
}

$current_user = $_SESSION['user_id'];
?>

<div class="row">
    <div class="col-md-12 text-center my-4">
        <h1 class="fw-bold" style="color: #1A1A1A; letter-spacing: -1px;">👨‍🍳 Benim Mutfağım</h1>
        <p class="text-muted">Sitede yayınladığınız, şef olarak imzanızı attığınız tarifleriniz:</p>
        <div class="mx-auto mt-2" style="width: 40px; height: 3px; background-color: #FF6B35; border-radius: 2px;"></div>
    </div>
</div>

<div class="row mt-4 justify-content-center">
    <div class="col-md-10">
        <?php
        $sorgu = "SELECT * FROM tarifler WHERE user_id = '$current_user' ORDER BY id DESC";
        $cevap = mysqli_query($baglanti, $sorgu);

        if (mysqli_num_rows($cevap) == 0) {
            echo '<div class="text-center p-5 recipe-card shadow-sm bg-white">
                    <h5 class="text-secondary mb-3">Henüz mutfağınızda hiç tarif paylaşmamışsınız.</h5>
                    <a href="tarifekle.php" class="btn btn-chef btn-sm">İlk Tarifini Ekle</a>
                  </div>';
        } else {
            while ($satir = mysqli_fetch_assoc($cevap)) {
                ?>
                <div class="card recipe-card shadow-sm mb-3 border-0 p-3">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div>
                            <h5 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($satir['baslik']); ?></h5>
                            <small class="text-muted">📅 Eklenme: <?php echo date('d.m.Y', strtotime($satir['eklenme_tarihi'])); ?></small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="tarifduzenle.php?id=<?php echo $satir['id']; ?>" class="btn btn-sm px-4 py-2" style="background-color: #FFF3CD; color: #856404; font-weight: 600; border-radius: 10px;">✏ Düzenle</a>
                            <a href="tarifsil.php?id=<?php echo $satir['id']; ?>" class="btn btn-sm px-4 py-2" style="background-color: #F8D7DA; color: #721C24; font-weight: 600; border-radius: 10px;" onclick="return confirm('Bu tarifi tamamen silmek istediğinize emin misiniz?');">🗑 Sil</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php 
include 'alt.php'; 
?>