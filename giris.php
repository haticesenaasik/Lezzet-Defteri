<?php 
include 'ust.php'; 

if (isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

if (isset($_POST['giris_buton'])) {
    $kullanici_adi = mysqli_real_escape_string($baglanti, $_POST['kullanici_adi']);
    $sifre = $_POST['sifre'];

    $sorgu = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$kullanici_adi'";
    $cevap = mysqli_query($baglanti, $sorgu);

    if (mysqli_num_rows($cevap) == 1) {
        $kullanici_verisi = mysqli_fetch_assoc($cevap);

        if (password_verify($sifre, $kullanici_verisi['sifre'])) {
            $_SESSION['user_id'] = $kullanici_verisi['id'];
            $_SESSION['kullanici_adi'] = $kullanici_verisi['kullanici_adi'];
            echo '<div class="alert alert-success">Başarıyla giriş yapıldı! Ana sayfaya yönlendiriliyorsunuz...</div>';
            echo '<script>setTimeout(function(){ window.location.href="index.php"; }, 1500);</script>';
        } else {
            echo '<div class="alert alert-danger">Kullanıcı adı veya şifre hatalı!</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Kullanıcı adı veya şifre hatalı!</div>';
    }
}
?>

<div class="row justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="col-md-5">
        <div class="card recipe-card shadow-lg p-4" style="border-radius: 25px;">
            <div class="card-body text-center">
                <h2 class="fw-extrabold mb-1" style="color: #1A1A1A;">Hoş Geldin Şef!</h2>
                <p class="text-muted mb-4">Lezzet dünyasına tekrar giriş yap.</p>
                <div class="mx-auto mb-4" style="width: 50px; height: 3px; background-color: #FF6B35; border-radius: 2px;"></div>

                <form action="giris.php" method="POST">
                    <div class="mb-3 text-start">
                        <label class="form-label fw-bold small">Kullanıcı Adı</label>
                        <input type="text" name="kullanici_adi" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-4 text-start">
                        <label class="form-label fw-bold small">Şifre</label>
                        <input type="password" name="sifre" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" required>
                    </div>
                    <button type="submit" name="giris_buton" class="btn btn-chef w-100 py-3 shadow-sm">Giriş Yap</button>
                </form>
                
                <p class="mt-4 text-muted small">Henüz üye değil misin? <a href="kaydol.php" class="fw-bold" style="color: #FF6B35; text-decoration: none;">Hemen Katıl</a></p>
            </div>
        </div>
    </div>
</div>

<?php 
include 'alt.php'; 
?>