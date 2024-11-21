<?php
session_start();

// Vider le panier en supprimant toutes les données associées à la session
unset($_SESSION['panier']);
unset($_SESSION['nb_produits_panier']);
?>
