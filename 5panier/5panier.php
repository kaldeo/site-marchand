<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style5.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <title>Panier</title>
    </head>
    <body>
        <header>
        <img src="../img/logo.png" alt="" class="logo">
            <ul>
                <li><a href="../1home/1home.php" class="active">Accueil</a></li>
                <li><a href="../2boutique/2boutique.php" class="active2">Boutique</a></li>
                <li><a href="../3about/3about.php" class="active3">A propos</a></li>
                <li><a href="../4compte/compte.php" class="active4">Compte</a></li>
                <li><a href="5panier.php" class="active5">Panier (<span id="nb_produits_panier"><?php echo isset($_SESSION['nb_produits_panier']) ? $_SESSION['nb_produits_panier'] : '0'; ?></span>)</a></li>
            </ul>
        </header>
        <h1>Votre Panier</h1>
        <div class="panier-container">
            <?php
            if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                foreach ($_SESSION['panier'] as $key => $produit) {
                    echo '<div class="produit">';
                    echo '<h3>' . $produit['nom'] . '</h3>';
                    echo '<p>Prix : ' . $produit['prix'] . ' €</p>';
                    echo '<p>Chemin de l\'image : ' . $produit['image_url'] . '</p>';
                    echo '<button onclick="supprimerProduitDuPanier(' . $key . ')">Supprimer du Panier</button>';
                    echo '</div>';
                }
                echo '<button id="vider-panier-btn" onclick="viderPanier()">Vider tout le Panier</button>
                ';
            } else {
                echo '<p class="panier-vide">Votre panier est vide.</p>';
            }
            ?>
        </div>
        <script src="supprimer_produit.js"></script>
        <script src="../2boutique/panier.js"></script>
    </body>
</html>
