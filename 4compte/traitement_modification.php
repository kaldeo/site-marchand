<?php
session_start();

if (isset($_SESSION['utilisateur_id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['mail']) && isset($_POST['login'])) {

    include('../connexion.php');

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $id_utilisateur = $_SESSION['utilisateur_id'];
    $new_first_name = $_POST['first_name'];
    $new_last_name = $_POST['last_name'];
    $new_mail = $_POST['mail'];
    $new_login = $_POST['login'];


    $sql = "UPDATE utilisateur SET first_name='$new_first_name', last_name='$new_last_name', mail='$new_mail', identifiant='$new_login' WHERE id_utilisateur=$id_utilisateur";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Modifications effectuées avec succès.');
        setTimeout(function(){ 
            window.location.href = 'compte.php';
        }, 1000);
    </script>";
    
    } else {
        echo "Erreur lors de la mise à jour des informations: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Une erreur est survenue lors de la mise à jour des informations.";
}
?>
