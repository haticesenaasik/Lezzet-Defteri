<?php 
include 'ust.php'; 

if (!isset($_SESSION['user_id'])) {
    echo '<div class="alert alert-danger" style="border-radius: 12px;">Bu sayfayı görebilmek için önce giriş yapmalısınız!</div>';
    echo '<script>setTimeout(function(){ window.location.href="giris.php"; }, 2000);</script>';
    include 'alt.php';
    exit();
}

if (isset($_POST['tarif_kaydet_buton'])) {
    $baslik = mysqli_real_escape_string($baglanti, $_POST['baslik']);
    $sure = mysqli_real_escape_string($baglanti, $_POST['sure']);
    $kisi = mysqli_real_escape_string($baglanti, $_POST['kisi']);
    $malzemeler = mysqli_real_escape_string($baglanti, $_POST['malzemeler']);
    $yapilis = mysqli_real_escape_string($baglanti, $_POST['yapilis']);
    $user_id = $_SESSION['user_id'];

    if (empty($baslik) || empty($malzemeler) || empty($yapilis)) {
        echo '<div class="alert alert-danger" style="border-radius: 12px;">Lütfen gerekli alanları doldurun!</div>';
    } else {
        $sorgu = "INSERT INTO tarifler (user_id, baslik, malzemeler, yapilis, sure, kisi) VALUES ('$user_id', '$baslik', '$malzemeler', '$yapilis', '$sure', '$kisi')";
        $cevap = mysqli_query($baglanti, $sorgu);

        if ($cevap) {
            echo '<div class="alert alert-success" style="border-radius: 12px;">Tarifiniz başarıyla gurme defterine eklendi!</div>';
            echo '<script>setTimeout(function(){ window.location.href="index.php"; }, 2000);</script>';
        } else {
            echo '<div class="alert alert-danger" style="border-radius: 12px;">Hata: ' . mysqli_error($baglanti) . '</div>';
        }
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card recipe-card shadow-sm p-4">
            <div class="card-body">
                <h2 class="fw-bold mb-1" style="color: #1A1A1A;">Yeni Bir Lezzet Paylaş</h2>
                <p class="text-muted small mb-4">Gurme detayları girerek tarifinizi zenginleştirin.</p>
                <div class="mb-4" style="width: 50px; height: 3px; background-color: #FF6B35; border-radius: 2px;"></div>
                
                <form action="tarifekle.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Yemek Adı / Tarif Başlığı *</label>
                        <input type="text" name="baslik" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" placeholder="Örn: Kremalı Mantarlı Tavuk Sote" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-secondary">Hazırlanış / Pişirme Süresi</label>
                            <input type="text" name="sure" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" placeholder="Örn: 45 Dakika">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-secondary">Kaç Kişilik?</label>
                            <input type="text" name="kisi" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" placeholder="Örn: 4-6 Kişilik">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Gerekli Malzemeler *</label>
                        <textarea name="malzemeler" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" rows="4" placeholder="Malzemeleri alt alta yazın..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Tarifin Hazırlanışı / Aşamaları *</label>
                        <textarea name="yapilis" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" rows="5" placeholder="Aşama aşama anlatın..." required></textarea>
                    </div>
                    <button type="submit" name="tarif_kaydet_buton" class="btn btn-chef w-100 py-3 mt-2 shadow-sm">Tarifi Dünyayla Paylaş</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'alt.php'; ?>