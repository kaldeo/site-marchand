<?php
session_start();

// Initialise le panier s'il n'existe pas déjà dans la session
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

// Vérifie si un produit est ajouté au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['prix'], $_POST['id'], $_POST['image_url'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $id = $_POST['id'];
    $image_url = $_POST['image_url'];

    // Exemple : Ajouter le produit au panier avec l'URL de l'image
    $produit = array(
        'id' => $id,
        'nom' => $nom,
        'prix' => $prix,
        'image_url' => $image_url,

        'quantite' => 1 // Vous pouvez modifier la quantité si le produit est déjà dans le panier
    );

    $_SESSION['panier'][] = $produit;

    // Mettre à jour le nombre total de produits dans le panier
    $_SESSION['nb_produits_panier'] = count($_SESSION['panier']);

    // Afficher le chemin de l'image ajoutée (pour vérification)
    echo '<p>Chemin de l\'image : ' . $image_url . '</p>';
}
?>
