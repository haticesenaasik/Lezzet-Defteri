## Kullanılan Araçlar
* **Model:** Google Gemini, Claude AI

## Konuşmalar
**1. Soru(Google Gemini):** ben uygulmamın daha kaliteli durmasını istiyorum. css kütüphanesini değiştirerek veya onunla yapabiliyorsan onunla yap ama benim uygulamamı daha kaliteli renk ve tasarımda oluştur. nefis yemek tarifleri, yemek.com, evdekilerle veya tarifmotoru gibi sitelerden ilham alabilirsin.
<br/>**1. Cevap:** 
```text
1. Adım: Sitenin Tavanı (ust.php) - Gurme Menü Tasarımı
Menüyü klasik siyah yerine, iştah kabartan modern bir gurme konseptine geçiriyoruz.

ust.php dosyanızı açın, her şeyi silip şu kodları yapıştırın:

PHP
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'baglan.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lezzet Defteri - Gurme Yemek Tarifleri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        /* Sitenin genel yazı stilini ve arka plan yumuşaklığını ayarlıyoruz */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FDFBF7; /* Gözü yormayan tatlı bir krem/fildişi tonu */
            color: #2D2D2D;
        }
        
        /* Premium Navbar Tasarımı */
        .custom-navbar {
            background-color: #1A1A1A !important; /* Premium antrasit */
            border-bottom: 3px solid #FF6B35; /* Altına ince iştah açıcı turuncu şerit */
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 800;
            letter-spacing: -1px;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 600;
            color: #E0E0E0 !important;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: #FF6B35 !important; /* Üzerine gelince turuncu parlama */
        }
        
        /* Premium Yumuşak Kartlar */
        .recipe-card {
            border: none !important;
            border-radius: 20px !important;
            background-color: #FFFFFF;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        .recipe-card:hover {
            transform: translateY(-8px); /* Hafif yukarı zıplama efekti */
            box-shadow: 0 15px 30px rgba(26, 26, 26, 0.08) !important;
        }
        
        /* Özel Gurme Butonları */
        .btn-chef {
            background-color: #FF6B35 !important;
            color: #FFFFFF !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            border: none !important;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-chef:hover {
            background-color: #E0531F !important;
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }

        .btn-chef-outline {
            border: 2px solid #FF6B35 !important;
            color: #FF6B35 !important;
            background-color: transparent !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }

        .btn-chef-outline:hover {
            background-color: #FF6B35 !important;
            color: #FFFFFF !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg custom-navbar navbar-dark mb-5 shadow-sm">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">
            <span style="color: #FF6B35;">👩‍🍳 Lezzet</span>Defteri
        </a>
        <button class="navbar-dark navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Keşfet</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="tarifekle.php">Tarifini Paylaş</a></li>
                    <li class="nav-item"><a class="nav-link" href="tariflerim.php">Mutfağım (Tariflerim)</a></li>
                    <li class="nav-item"><a class="nav-link" href="kaydedilenler.php">Tarif Defterim</a></li>
                <?php endif; ?>
            </ul>
            
            <div class="d-flex align-items-center">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <span class="text-light me-3">Şef: <strong style="color: #FF6B35;"><?php echo $_SESSION['kullanici_adi']; ?></strong></span>
                    <a href="cikis.php" class="btn btn-sm btn-outline-light px-3" style="border-radius: 10px;">Çıkış</a>
                <?php else: ?>
                    <a href="giris.php" class="btn btn-chef-outline btn-sm me-2 px-3">Giriş Yap</a>
                    <a href="kaydol.php" class="btn btn-chef btn-sm px-3">Katıl</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<div class="container">

2. Adım: Sitenin Tabanı (alt.php) - Kusursuz Alt Alan
Alt alanın tam alta yapışmasını sağlayan sistemi koruyup, renk uyumununavbar ile bütünleştiriyoruz.

alt.php dosyanızı açın, silip şunları yapıştırın:

PHP
</div> <footer class="text-white text-center py-4 mt-auto" style="background-color: #1A1A1A; border-top: 4px solid #FF6B35;">
    <div class="container">
        <p class="mb-1 fw-bold" style="letter-spacing: 0.5px;">🍔 Lezzet Defteri</p>
        <p class="mb-0 small text-muted">&copy; 2026 Tüm Hakları Saklıdır. Web Tabanlı Programlama Dönem Ödevi</p>
    </div>
</footer>

<style>
    html, body {
        height: 100%;
    }
    body {
        display: flex;
        flex-direction: column;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
3. Adım: Ana Sayfa Vitrini (index.php) - Yemek.com Stili Kartlar
Tariflerin listelendiği ana sayfayı tam bir görsel şölene çeviriyoruz. Kartların başlıklarını, usta adını ve malzemelerin durduğu alanları çok daha estetik bir forma sokuyoruz.

index.php dosyanızı açın, silip şunları yapıştırın:

PHP
<?php 
include 'ust.php'; 
?>

<div class="row">
    <div class="col-md-12 text-center my-4">
        <h1 class="display-4 fw-extrabold" style="font-weight: 800; color: #1A1A1A; letter-spacing: -1px;">
            Bugün Ne Pişirmek İstersin?
        </h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px; font-size: 1.1rem;">
            Evdeki malzemelerle hazırlayabileceğiniz, şeflerin elinden çıkma en güncel ve nefis yemek tarifleri.
        </p>
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
        echo '<div class="col-md-12 text-center text-muted my-5">
                <div class="p-5 recipe-card shadow-sm text-center">
                    <h5 class="text-secondary">Henüz hiç tarif paylaşılmamış. İlk şefimiz sen ol!</h5>
                </div>
              </div>';
    } else {
        while ($satir = mysqli_fetch_assoc($cevap)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 recipe-card shadow-sm">
                    <div class="card-body d-flex flex-column p-4">
                        
                        <h3 class="h5 fw-bold mb-1" style="color: #1A1A1A; line-height: 1.3;">
                            <?php echo htmlspecialchars($satir['baslik']); ?>
                        </h3>
                        
                        <span class="badge align-self-start mb-3" style="background-color: rgba(255, 107, 53, 0.1); color: #FF6B35; font-weight: 600; border-radius: 6px;">
                            👨‍🍳 Şef: <?php echo htmlspecialchars($satir['kullanici_adi']); ?>
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
                            <span class="text-muted d-block small mb-3">🕒 <?php echo date('d.m.Y H:i', strtotime($satir['eklenme_tarihi'])); ?></span>
                            
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <?php 
                                $current_user = $_SESSION['user_id'];
                                $current_tarif = $satir['id'];
                                $kontrol_sorgu = "SELECT * FROM kaydedilenler WHERE user_id = '$current_user' AND tarif_id = '$current_tarif'";
                                $kontrol_cevap = mysqli_query($baglanti, $kontrol_sorgu);
                                ?>

                                <?php if ($satir['user_id'] == $_SESSION['user_id']): ?>
                                    <button class="btn btn-secondary btn-sm w-100 py-2" style="border-radius: 10px;" disabled>Kendi Tarifiniz</button>
                                <?php elseif (mysqli_num_rows($kontrol_cevap) > 0): ?>
                                    <button class="btn btn-light btn-sm w-100 py-2 text-muted" style="border-radius: 10px; border: 1px solid #DDD;" disabled>✓ Deftere Kaydedildi</button>
                                <?php else: ?>
                                    <a href="kaydet_islem.php?id=<?php echo $satir['id']; ?>" class="btn btn-chef btn-sm w-100 py-2 shadow-sm">⭐ Deftere Kaydet</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <small class="text-danger d-block text-center fw-bold">Kaydetmek için giriş yapmalısınız.</small>
                            <?php endif; ?>
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
```

**2. Soru(Google Gemini):** ana sayfadaki yemek kartlarında yemeğin resmi, kim tarafından yapıldığı hazırlanışının ne kadar süreceği ve kaç kişilik olduğu bilgisi yazsın. üzerine tıklanınca yani tarife girince malzemeler ve aşamalar da gözüksün.
<br/>**2. Cevap:** 
```text
Adım 1: Tarif Paylaşma Sayfası (tarifekle.php)
Kullanıcıdan artık yemek resminin internet linkini, hazırlama süresini ve kaç kişilik olduğunu da alacağız.

tarifekle.php dosyanızın içini tamamen silip şu güncel kodları yapıştırın:

PHP
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
    $resim = mysqli_real_escape_string($baglanti, $_POST['resim']);
    $sure = mysqli_real_escape_string($baglanti, $_POST['sure']);
    $kisi = mysqli_real_escape_string($baglanti, $_POST['kisi']);
    $malzemeler = mysqli_real_escape_string($baglanti, $_POST['malzemeler']);
    $yapilis = mysqli_real_escape_string($baglanti, $_POST['yapilis']);
    $user_id = $_SESSION['user_id'];

    if (empty($baslik) || empty($malzemeler) || empty($yapilis)) {
        echo '<div class="alert alert-danger" style="border-radius: 12px;">Lütfen gerekli alanları doldurun!</div>';
    } else {
        // Yeni sütunları INSERT sorgusuna dahil ediyoruz
        $sorgu = "INSERT INTO tarifler (user_id, resim, baslik, malzemeler, yapilis, sure, kisi) VALUES ('$user_id', '$resim', '$baslik', '$malzemeler', '$yapilis', '$sure', '$kisi')";
        $cevap = mysqli_query($baglanti, $sorgu);

        if ($cevap) {
            echo '<div class="alert alert-success" style="border-radius: 12px;">Tarifiniz başarıyla yayınlandı!</div>';
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
                        <input type="text" name="baslik" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" placeholder="Örn: Fırında Kremalı Patatesli Tavuk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Yemek Görsel Linki (Google Resim Adresi URL)</label>
                        <input type="url" name="resim" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" placeholder="https://site.com/gorsel.jpg">
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
                    <button type="submit" name="tarif_kaydet_buton" class="btn btn-chef w-100 py-3 mt-2 shadow-sm">Tarifi Dünyayla Paylaş 🚀</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'alt.php'; ?>

Adım 2: Tamamen Yeni Sayfa! Tarif Detay Sayfası (tarifdetay.php)
Ana sayfadaki karta veya butona tıklanınca açılacak, malzemeleri ve aşamaları lüks bir şekilde gösterecek olan sayfamız.

Kod editörünüzde yeni bir sayfa açın.

Kodları yapıştırıp klasörünüze tarifdetay.php adıyla kaydedin:

PHP
<?php 
include 'ust.php'; 

if (!isset($_GET['id'])) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

$tarif_id = (int)$_GET['id'];

// Tarif bilgilerini ve yazan ustanın adını çekiyoruz
$sorgu = "SELECT tarifler.*, kullanicilar.kullanici_adi 
          FROM tarifler 
          INNER JOIN kullanicilar ON tarifler.user_id = kullanicilar.id 
          WHERE tarifler.id = '$tarif_id'";
$cevap = mysqli_query($baglanti, $sorgu);

if (mysqli_num_rows($cevap) == 0) {
    echo '<div class="alert alert-danger" style="border-radius: 12px;">Tarif bulunamadı!</div>';
    include 'alt.php';
    exit();
}

$tarif = mysqli_fetch_assoc($cevap);
$yemek_resmi = !empty($tarif['resim']) ? $tarif['resim'] : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=500';
?>

<div class="row justify-content-center mt-3">
    <div class="col-md-10">
        <div class="card recipe-card shadow-sm border-0 p-4 bg-white">
            
            <div class="text-center mb-4">
                <h1 class="fw-bold text-dark display-5"><?php echo htmlspecialchars($tarif['baslik']); ?></h1>
                <p class="text-muted">👨‍🍳 Tarif Sahibi Şef: <span class="fw-bold style-color" style="color: #FF6B35;"><?php echo htmlspecialchars($tarif['kullanici_adi']); ?></span></p>
                <div class="mx-auto" style="width: 60px; height: 4px; background-color: #FF6B35; border-radius: 2px;"></div>
            </div>

            <div class="mb-4 text-center">
                <img src="<?php echo $yemek_resmi; ?>" class="img-fluid rounded-4 shadow-sm" style="max-height: 450px; width: 100%; object-fit: cover; border-radius: 20px;">
            </div>

            <div class="row text-center mb-5 justify-content-center">
                <div class="col-6 col-md-3 mb-2">
                    <div class="p-3 bg-light rounded-4" style="border-radius: 15px;">
                        <span class="d-block text-muted small">Hazırlanış Süresi</span>
                        <strong class="text-dark">🕒 <?php echo !empty($tarif['sure']) ? htmlspecialchars($tarif['sure']) : 'Belirtilmedi'; ?></strong>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-2">
                    <div class="p-3 bg-light rounded-4" style="border-radius: 15px;">
                        <span class="d-block text-muted small">Porsiyon Ölçüsü</span>
                        <strong class="text-dark">👥 <?php echo !empty($tarif['kisi']) ? htmlspecialchars($tarif['kisi']) : 'Belirtilmedi'; ?></strong>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="p-4 rounded-4" style="background-color: #FAFAFA; border-left: 4px solid #FF6B35; border-radius: 15px;">
                        <h4 class="h5 fw-bold text-dark mb-3 text-uppercase" style="letter-spacing: 0.5px;">📋 Gerekli Malzemeler</h4>
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

Adım 3: Tarif Düzenleme Formu Güncellemesi (tarifduzenle.php)
Kullanıcı kendi tarifini güncellerken yeni eklediğimiz süre, kişi ve resim linki alanlarını da düzeltebilmeli.

tarifduzenle.php dosyanızın içini tamamen silip şu kodları yerleştirin:

PHP
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
    $resim = mysqli_real_escape_string($baglanti, $_POST['resim']);
    $sure = mysqli_real_escape_string($baglanti, $_POST['sure']);
    $kisi = mysqli_real_escape_string($baglanti, $_POST['kisi']);
    $malzemeler = mysqli_real_escape_string($baglanti, $_POST['malzemeler']);
    $yapilis = mysqli_real_escape_string($baglanti, $_POST['yapilis']);

    $guncelle_sorgu = "UPDATE tarifler SET baslik='$baslik', resim='$resim', sure='$sure', kisi='$kisi', malzemeler='$malzemeler', yapilis='$yapilis' WHERE id='$tarif_id' AND user_id='$user_id'";
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
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">Yemek Görsel Linki</label>
                        <input type="url" name="resim" class="form-control p-3 border-0 bg-light" style="border-radius: 12px;" value="<?php echo htmlspecialchars($tarif_verisi['resim']); ?>">
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

```
**3. Soru(Claude AI):** tüm dosyalarım bu şekilde. bu projeye uygun bir readme.md hazırla
<br/>**3. Cevap:**
# 👩‍🍳 Lezzet Defteri

PHP ve MySQL ile geliştirilmiş, kullanıcıların yemek tarifi paylaşıp kaydedebileceği bir web uygulaması.

---

## 🚀 Özellikler

- Kullanıcı kaydı ve güvenli giriş (`password_hash` / `password_verify`)
- Tarif ekleme, düzenleme ve silme
- Tarifleri "Tarif Defteri"ne kaydetme
- Kendi tariflerini ayrı sayfada yönetme
- Responsive tasarım (Bootstrap 5)

---

## 🛠️ Kurulum

### Gereksinimler
- PHP 7.4+
- MySQL 5.7+
- Apache / XAMPP / WAMP

### Adımlar

1. Repoyu klonla:
```bash
git clone https://github.com/KULLANICI_ADIN/lezzet-defteri.git
```

2. Proje klasörünü sunucu dizinine taşı:
```
XAMPP → htdocs/lezzet-defteri/
WAMP  → www/lezzet-defteri/
```

3. Veritabanını oluştur, `baglan.php` içindeki bilgileri kendi bilgilerinle güncelle:
```php
$baglanti = mysqli_connect("localhost", "KULLANICI_ADIN", "SIFRE", "VERITABANI_ADI");
```

4. Aşağıdaki SQL'i phpMyAdmin'de çalıştır:
```sql
CREATE TABLE kullanicilar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kullanici_adi VARCHAR(50) NOT NULL UNIQUE,
    eposta VARCHAR(100) NOT NULL UNIQUE,
    sifre VARCHAR(255) NOT NULL
);

CREATE TABLE tarifler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    baslik VARCHAR(150) NOT NULL,
    malzemeler TEXT,
    yapilis TEXT,
    sure VARCHAR(50),
    kisi VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES kullanicilar(id) ON DELETE CASCADE
);

CREATE TABLE kaydedilenler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    tarif_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES kullanicilar(id) ON DELETE CASCADE,
    FOREIGN KEY (tarif_id) REFERENCES tarifler(id) ON DELETE CASCADE
);
```

5. Tarayıcıda aç:
```
http://localhost/lezzet-defteri/
```

---

## 📁 Dosya Yapısı

```
lezzet-defteri/
├── index.php           # Ana sayfa — tüm tarifler
├── giris.php           # Giriş sayfası
├── kaydol.php          # Kayıt sayfası
├── cikis.php           # Çıkış işlemi
├── tarifekle.php       # Yeni tarif ekleme
├── tarifdetay.php      # Tarif detay sayfası
├── tarifduzenle.php    # Tarif düzenleme
├── tarifsil.php        # Tarif silme işlemi
├── tariflerim.php      # Kullanıcının kendi tarifleri
├── kaydedilenler.php   # Kaydedilen tarifler
├── kaydet_islem.php    # Tarif kaydetme işlemi
├── kaydet_sil.php      # Kaydedilen tarifi kaldırma
├── ust.php             # Header (navbar, session, CSS)
├── alt.php             # Footer
├── baglan.php          # ⚠️ Veritabanı bağlantısı — kendi bilgilerini gir
├── kart_bg.jpg         # Kart arka plan görseli
└── kart_detay_bg.jpg   # Detay sayfası arka plan görseli
```

---


## 🧰 Kullanılan Teknolojiler

| Teknoloji | Açıklama |
|---|---|
| PHP | Sunucu taraflı dil |
| MySQL | Veritabanı |
| Bootstrap 5 | Responsive tasarım |
| Plus Jakarta Sans | Yazı tipi |

---

## 📄 Lisans

Bu proje [MIT Lisansı](LICENSE) ile lisanslanmıştır.
```