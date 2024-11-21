<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <img src="../img/logo.png" alt="" class="logo">
        <ul>
            <li><a href="../1home/1home.php" class="active">Accueil</a></li>
            <li><a href="2boutique.php" class="active2">Boutique</i></a></li>
            <li><a href="../3about/3about.php" class="active3">A propos</a></li>
            <li><a href="../4compte/compte.php" class="active4">Compte</a></li>
            <li><a href="../5panier/5panier.php" class="active5">Panier (<span id="nb_produits_panier"><?php echo isset($_SESSION['nb_produits_panier']) ? $_SESSION['nb_produits_panier'] : '0'; ?></span>)</a></li>
        </ul>
    </header>
    <div class="container">
        <?php

            // Vérifie si l'ID du produit est présent dans l'URL
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                // Récupère l'ID du produit depuis l'URL
                $product_id = $_GET['id'];

                include('../connexion.php');

                if ($conn->connect_error) {
                    die("Connexion échouée : " . $conn->connect_error);
                }

                // Requête SQL pour récupérer les détails du produit en fonction de son ID
                $sql = "SELECT * FROM produit WHERE id = $product_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Affichage des détails du produit
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product-details">';
                        echo '<h1>' . $row['nom'] . '</h1>';
                        echo '<div class="grid-container">';
                        echo '<div class="item1"><img src="' . $row['image_url'] . '" alt="Image"></div>';
                        echo '<div class="item2">Catégorie: ' . $row['categorie'] . '</div>';
                        echo '<div class="item3">Description: ' . $row['description'] . '</div>';
                        echo '<div class="item4">Stock: ' . $row['stock'] . '</div>';
                        echo '<div class="item5">Prix: ' . $row['prix'] . ' €</div>';
                        echo '</div>'; // Fermeture de la div "grid-container"
                        echo '<button id="ajouter-au-panier-' . $row['id'] . '" onclick="ajouterAuPanier(\'' . $row['nom'] . '\', ' . $row['prix'] . ', ' . $row['id'] . ')">Ajouter au Panier</button>';
                        echo '</div>'; // Fermeture de la div "product-details"
                        // Vous pouvez afficher d'autres détails du produit ici
                    }
                } else {
                    echo "Aucun produit trouvé avec cet ID.";
                }
                // Fermer la connexion à la base de données
                $conn->close();
            } else {
                echo "Aucun ID de produit spécifié.";
            }
        ?>
    </div>
    <script src="panier.js"></script>
</body>
</html>
