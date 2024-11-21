<?php
session_start();
// Vérifier si la variable de session existe et renvoyer le nombre de produits dans le panier
if (isset($_SESSION['panier'])) {
    echo count($_SESSION['panier']);
} else {
    echo '0';
}
?>
