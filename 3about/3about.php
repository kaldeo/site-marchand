<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style3.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <title>à propos</title>
    </head>
    <body>
        <header>
        <img src="../img/logo.png" alt="" class="logo">
            <ul>
                <li><a href="../1home/1home.php" class="active">Accueil</a></li>
                <li><a href="../2boutique/2boutique.php" class="active2">Boutique</a></li>
                <li><a href="3about.php" class="active3">A propos</a></li>
                <li><a href="../4compte/compte.php" class="active4">Compte</a></li>
                <li><a href="../5panier/5panier.php" class="active5">Panier (<span id="nb_produits_panier"><?php echo isset($_SESSION['nb_produits_panier']) ? $_SESSION['nb_produits_panier'] : '0'; ?></span>)</a></li>
            </ul>
        </header>
        <div class="presentation-container">
        <div class="presentation">
            <h1>Présentation du Site :</h1>
            <p class="paragraph">
                Plongez dans un monde d'aventure, de créativité et d'émotion avec MangaManiaShop, votre destination en ligne pour l'univers riche et coloré des mangas. Notre plateforme est dédiée à tous les passionnés de bande dessinée japonaise, offrant une vaste sélection de mangas allant des classiques intemporels aux dernières nouveautés, le tout à portée de clic.
            </p>
        </div>
        <div class="presentation">
            <h1>Présentation de nos Produits :</h1>
            <p class="paragraph">
                Chez MangaManiaShop, nous sommes fiers de vous offrir une bibliothèque diversifiée et soigneusement sélectionnée de mangas. Plongez-vous dans des séries populaires telles que "One Piece", "Naruto", "My Hero Academia" et bien d'autres, disponibles en versions originales ou traduites pour répondre à tous les fans, novices ou confirmés. Notre catalogue s'étend également aux artbooks, figurines, produits dérivés et éditions spéciales pour enrichir votre collection et vous plonger au cœur de vos univers préférés.
            </p>
        </div>
        <div class="full-width-box">
            <h1>Raison pour la Création du Site :</h1>
            <p class="paragraph">
                MangaManiaShop est né de la passion dévorante pour l'art du manga. Notre objectif est de rassembler une communauté vibrante et enthousiaste, de partager cette passion et de rendre accessible à tous la richesse culturelle et artistique des mangas. Nous croyons fermement que ces histoires captivantes et ces personnages attachants peuvent transcender les frontières, rassemblant les gens à travers des récits universels et des illustrations captivantes.
            </p>
            <!-- ... Autres paragraphes ... -->
        </div>
    </div>
    </body>
</html>

