<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Mon Compte</title>
</head>
<body>
    <header>
    <img src="../img/logo.png" alt="" class="logo">
        <ul>
            <li><a href="../1home/1home.php" class="active">Accueil</a></li>
            <li><a href="../2boutique/2boutique.php" class="active2">Boutique</a></li>
            <li><a href="../3about/3about.php" class="active3">A propos</a></li>
            <li><a href="compte.php" class="active4">Compte</a></li>
            <li><a href="../5panier/5panier.php" class="active5">Panier (<span id="nb_produits_panier"><?php echo isset($_SESSION['nb_produits_panier']) ? $_SESSION['nb_produits_panier'] : '0'; ?></span>)</a></li>
        </ul>
    </header>
    <div class="contain">
        <div class="infoperso">
            <h1>Informations personnelles</h1>
            <br>
            <br>
            <?php
                if (isset($_SESSION['utilisateur_id'])) {

                    include('../connexion.php');

                    if ($conn->connect_error) {
                        die("Connexion échouée : " . $conn->connect_error);
                    }

                    // Récupérez l'ID de l'utilisateur à partir de la session
                    $id_utilisateur = $_SESSION['utilisateur_id'];

                    // Requête SQL pour récupérer les informations de l'utilisateur
                    $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = $id_utilisateur";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        // Affichez les informations de l'utilisateur
                        while ($row = $result->fetch_assoc()) {
                            
                            echo "<div>";
                            echo "<label for='last_name'>Nom: </label>";
                            echo "<span id='last_name'>" . $row['last_name'] . "</span>";
                            echo "</div>";

                            echo "<div>";
                            echo "<label for='first_name'>Prénom: </label>";
                            echo "<span id='first_name'>" . $row['first_name'] . "</span>";
                            echo "</div>";

                            echo "<div>";
                            echo "<label for='mail'>Email: </label>";
                            echo "<span id='mail'>" . $row['mail'] . "</span>";
                            echo "</div>";

                            echo "<div>";
                            echo "<label for='identifiant'>Identifiant: </label>";
                            echo "<span id='identifiant'>" . $row['identifiant'] . "</span>";
                            echo "</div>";
                        }
                    } else {
                        echo "Aucune information d'utilisateur trouvée.";
                    }

                    // Fermeture de la connexion à la base de données
                    $conn->close();
                } else {
                    echo "Utilisateur non connecté.";
                    echo '<a href="../ouvrir_en_premier.php">Se connecter</a>';

                }
            ?>

            <a href="../ouvrir_en_premier.php" type="submit" id="submit">Se déconnecter</a>
        </div>

        <div class="modifications">
            <h1>Modifier vos Informations</h1>
            <br>
            <br>

            <form action="traitement_modification.php" method="post">
                <input type="hidden" name="user_id" value="">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="first_name" placeholder="Entrez votre nom" required>
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="last_name" placeholder="Entrez votre prénom" required>
                <label for="mail">Email:</label>
                <input type="text" id="mail" name="mail" placeholder="Entrez votre email" required>
                <label for="login">Identifiant:</label>
                <input type="text" id="login" name="login" placeholder="Entrez votre Identifiant" required>
                <button type="submit" id="submit">Enregistrer les Modifications</button>
            </form>
        </div>
    </div>
    
</body>
</html>