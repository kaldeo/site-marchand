<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style2.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

        <title>Boutique</title>
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
        <div class="notre_boutique">
            <h1>Notre Boutique</h1>
            <form method="GET" action="">
                <label for="categorie" class="choix">Choisissez une catégorie :</label>
                <select name="categorie" id="categorie">
                    <option value="">Toutes les catégories</option>
                    <?php
                    include('../connexion.php');

                    if ($conn->connect_error) {
                        die("Connexion échouée : " . $conn->connect_error);
                    }

                    // Récupérer les catégories depuis la base de données
                    $query = "SELECT DISTINCT categorie FROM produit";
                    $result = $conn->query($query);

                    // Afficher les options de la liste déroulante
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['categorie'] . '">' . $row['categorie'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Rechercher" id="submit">
            </form>

        </div>
        <?php
                // Si une catégorie est sélectionnée dans le formulaire
                if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
                    $categorie = $_GET['categorie'];

                    // Requête SQL pour récupérer les produits de la catégorie sélectionnée
                    $sql = "SELECT * FROM produit WHERE categorie = '$categorie'";
                } else {
                    // Requête SQL pour récupérer tous les produits
                    $sql = "SELECT * FROM produit";
                }

                // Exécuter la requête SQL
                $result = $conn->query($sql);

                // Afficher les produits correspondants à la catégorie sélectionnée
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Afficher les détails du produit
                        echo '<div class="produit" style="background-color: rgba(255, 255, 255, 0.7);">';
                        echo '<h3>' . $row['nom'] . '</h3>';
                        echo '<p>Catégorie: ' . $row['categorie'] . '</p>';
                        echo '<p class="description_prod">' . $row['description'] . '</p>';
                        echo '<p>Stock: ' . $row['stock'] . '</p>';
                        echo '<img src="' . $row['image_url'] . '" alt="Image" style="width: 180px; height: 300px;">';
                        echo '<p>Prix: ' . $row['prix'] . ' €</p>';
                        echo '<button id="ajouter-au-panier-' . $row['id'] . '" onclick="ajouterAuPanier(\'' . $row['nom'] . '\', ' . $row['prix'] . ', ' . $row['id'] . ')">Ajouter au Panier</button>';
                        echo '<a class="details-btn" href="../details/produit_details.php?id=' . $row['id'] . '">Voir les détails</a>';
                        // Afficher d'autres détails du produit...
                        echo '</div>';
                    }
                } else {
                    echo "Aucun produit trouvé pour cette catégorie.";
                }

                // Fermer la connexion à la base de données
                $conn->close();
            ?>
        <script src="panier.js"></script>
    </body>
</html>
