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
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FDFBF7;
            color: #2D2D2D;
        }
        
        .custom-navbar {
            background-color: #1A1A1A !important;
            border-bottom: 3px solid #FF6B35;
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
            color: #FF6B35 !important;
        }
    
        .recipe-card {
            border: none !important;
            border-radius: 20px !important;
            background-color: #FFFFFF;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        .recipe-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(26, 26, 26, 0.08) !important;
        }
        
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
                    <span class="text-light me-3">Merhaba, <strong style="color: #FF6B35;"><?php echo $_SESSION['kullanici_adi']; ?></strong></span>
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