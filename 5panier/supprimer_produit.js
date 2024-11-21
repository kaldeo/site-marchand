function supprimerProduitDuPanier(key) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../2boutique/supprimer.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Si la suppression a réussi, mettre à jour le nombre de produits dans le panier
                mettreAJourNombreProduitsPanier();
                // Recharger la page pour afficher le panier mis à jour
                window.location.reload();
            } else {
                alert("Erreur lors de la suppression du produit du panier.");
            }
        }
    };
    // Envoyer la clé du produit à supprimer
    xhr.send("key=" + key);
}

function viderPanier() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "vider_panier.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Mettre à jour le nombre de produits dans le panier après avoir vidé
                mettreAJourNombreProduitsPanier();
                // Recharger la page pour afficher le panier vidé
                window.location.reload();
            } else {
                alert("Erreur lors du vidage du panier.");
            }
        }
    };
    xhr.send();
}
