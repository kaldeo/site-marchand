<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <title>Home</title>
    </head>
    <body>
        <header>
        <img src="../img/logo.png" alt="" class="logo">
            <ul>
                <li><a href="1home.php" class="active">Accueil</a></li>
                <li><a href="../2boutique/2boutique.php" class="active2">Boutique</a></li>
                <li><a href="../3about/3about.php" class="active3">A propos</a></li>
                <li><a href="../4compte/compte.php" class="active4">Compte</a></li>
                <li><a href="../5panier/5panier.php" class="active5">Panier (<span id="nb_produits_panier"><?php echo isset($_SESSION['nb_produits_panier']) ? $_SESSION['nb_produits_panier'] : '0'; ?></span>)</a></li>
            </ul>
        </header>
        <div class="content">
            <div class="left-section">
                <img src="../img/logo.png" alt="">
            </div>
            <div class="right-section">
                <h1>Bienvenue sur MangaManiaShop !</h1>
                <h2>Votre boutique en ligne de manga préféré</h2>
            </div>
        </div>
    </body>
</html>
