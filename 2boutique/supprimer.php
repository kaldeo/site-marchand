<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['key'])) {
        $key = $_POST['key'];
        // Supprimer le produit du panier en utilisant la clé fournie
        if (isset($_SESSION['panier'][$key])) {
            unset($_SESSION['panier'][$key]);
            // Mettre à jour le nombre total de produits dans le panier
            $_SESSION['nb_produits_panier'] = count($_SESSION['panier']);
            echo "success";
        } else {
            echo "Erreur : produit introuvable dans le panier.";
        }
    } else {
        echo "Erreur : aucune clé fournie pour la suppression.";
    }
}
?>
