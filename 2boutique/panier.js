function ajouterAuPanier(nom, prix, id, image_url) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajouter_au_panier.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                mettreAJourNombreProduitsPanier();
            } else {
                alert("Une erreur est survenue lors de l'ajout au panier.");
            }
        }
    };
    xhr.send("nom=" + nom + "&prix=" + prix + "&id=" + id + "&image_url=" + image_url);
}


function mettreAJourNombreProduitsPanier() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("nb_produits_panier").innerText = xhr.responseText;
            }
        }
    };
    xhr.open("GET", "obtenir_nombre_produits_panier.php", true);
    xhr.send();
}



