<?php 
include 'ust.php'; 

if (isset($_POST['kaydol_buton'])) {
    $kullanici_adi = mysqli_real_escape_string($baglanti, $_POST['kullanici_adi']);
    $eposta = mysqli_real_escape_string($baglanti, $_POST['eposta']);
    $sifre = $_POST['sifre'];

    if (empty($kullanici_adi) || empty($eposta) || empty($sifre)) {
        echo '<div class="alert alert-danger">Lütfen tüm alanları doldurunuz!</div>';
    } else {
        $sifre_sifreli = password_hash($sifre, PASSWORD_DEFAULT);

        $sorgu = "INSERT INTO kullanicilar (kullanici_adi, eposta, sifre) VALUES ('$kullanici_adi', '$eposta', '$sifre_sifreli')";
        $cevap = mysqli_query($baglanti, $sorgu);

        if ($cevap) {
            echo '<div class="alert alert-success">Kayıt başarıyla tamamlandı! Şimdi giriş yapabilirsiniz.</div>';
        } else {
            echo '<div class="alert alert-danger">Kayıt sırasında bir hata oluştu: ' . mysqli_error($baglanti) . '</div>';
        }
    }
}
?>

<div class="row justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="col-md-5">
        <div class="card recipe-card shadow-lg p-4" style="border-radius: 25px;">
            <div class="card-body text-center">
                <h2 class="fw-extrabold mb-1" style="color: #1A1A1A;">Gurme Ailemize Katıl</h2>
                <p class="text-muted mb-4">Kendi tariflerini paylaşmaya başla.</p>
                <div class="mx-auto mb-4" style="width: 50px; height: 3px; background-color: #FF6B35; border-radius: 2px;"></div>

                <form action="kaydol.php" method="POST">
                    <div class="mb-3 text-start">
                        <label class="form-label fw-bold small">Kullanıcı Adı</label>
                        <input type="text" name="kullanici_adi" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label fw-bold small">E-posta</label>
                        <input type="email" name="eposta" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-4 text-start">
                        <label class="form-label fw-bold small">Şifre</label>
                        <input type="password" name="sifre" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" required>
                    </div>
                    <button type="submit" name="kaydol_buton" class="btn btn-chef w-100 py-3 shadow-sm">Kayıt Ol ve Başla</button>
                </form>
                
                <p class="mt-4 text-muted small">Zaten üye misin? <a href="giris.php" class="fw-bold" style="color: #FF6B35; text-decoration: none;">Giriş Yap</a></p>
            </div>
        </div>
    </div>
</div>

<?php 
include 'alt.php'; 
?>