<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="login/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function deleteCookie(name) {
            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }

        window.addEventListener('beforeunload', function() {
            deleteCookie("PHPSESSID");
        });
    </script>
</head>
<body>
    <div class="container">
        <span></span>
        <span></span>
        <span></span>
        <form id="signinFrom"  method="post">

            <?php
            
            include('connexion.php');

            if ($conn->connect_error) {
                die("Connexion échouée : " . $conn->connect_error);
            }
            
            // Vérification si le formulaire de connexion est soumis
            if (isset($_POST['login']) && isset($_POST['mot_de_passe'])) {
                $login = $_POST['login'];
                $mot_de_passe = sha1($_POST['mot_de_passe']);

                // Requête pour vérifier les informations de connexion dans la table 'users'
                $sql = "SELECT * FROM utilisateur WHERE identifiant='$login' AND mot_de_passe='$mot_de_passe'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    session_start(); // Démarrez la session
                    $_SESSION['loggedin'] = true; // Variable de session pour indiquer que l'utilisateur est connecté
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['utilisateur_id'] = $row['id_utilisateur'];
                        $_SESSION['first_name'] = $row['first_name'];
                        $_SESSION['last_name'] = $row['last_name'];
                        $_SESSION['mail'] = $row['mail']; // Sauvegarde de l'ID de l'utilisateur dans la session
                        // D'autres données peuvent également être sauvegardées dans la session selon vos besoins
                    }
                    header("Location: 1home/1home.php");
                    exit(); // Assurez-vous de quitter le script après la redirection
                } else {
                    echo "Identifiant ou mot de passe incorrect";
                }
            }

            $conn->close();
            ?>


            <h2>Connexion</h2>
            <div class="inputBox">
                <input type="text" id="login" name="login" placeholder="Identifiant" required>
            </div>
            <div class="inputBox">
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required>
            </div>
            <div class="inputBox group">
                <a href="#" id="signup">Créer un compte</a>
            </div>
            <div class="inputBox">
                <input type="submit" class="btn" value="Se connecter">
            </div>
        </form>



        <form id="signupForm"  method="post">


            <?php
            
            include('connexion.php');

            if ($conn->connect_error) {
                die("Connexion échouée : " . $conn->connect_error);
            }

                    // Vérification si le formulaire d'inscription est soumis
            if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['mail']) && isset($_POST['login']) && isset($_POST['mot_de_passe'])) {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $mail = $_POST['mail'];
                $login = $_POST['login'];
                $mot_de_passe = sha1($_POST['mot_de_passe']);
                

                // Requête pour insérer un nouvel utilisateur dans la table 'users'
                $sql = "INSERT INTO utilisateur (first_name, last_name, mail, identifiant, mot_de_passe) VALUES ('$first_name', '$last_name', '$mail', '$login', '$mot_de_passe')";

                if ($conn->query($sql) === TRUE) {
                    echo "Nouvel utilisateur créé avec succès!";
                    // Vous pouvez rediriger l'utilisateur vers une autre page ici
                } else {
                    echo "Erreur lors de la création de l'utilisateur: " . $conn->error;
                }
            }

            // Fermeture de la connexion à la base de données
            $conn->close();
            ?>


            <h2>Créer un compte</h2>
            <div class="inputBox">
                <input type="text" id="first_name" name="first_name" placeholder="Nom" required>
            </div>
            <div class="inputBox">
                <input type="text" id="last_name" name="last_name" placeholder="Prénom" required>
            </div>
            <div class="inputBox">
                <input type="email" id="mail" name="mail" placeholder="Adresse mail" required>
            </div>
            <div class="inputBox">
                <input type="text" id="login" name="login" placeholder="Identifiant" required>
            </div>
            <div class="inputBox">
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required>
            </div>
            <div class="inputBox">
                <input type="submit" class="btn" value="Créer un compte">
            </div>
            <div class="inputBox_group">
                <a href="#">Déja un compte ? <b id="signin">Se connecter</b></a>
            </div>
        </form>
    </div>
    <script>
        let signup = document.querySelector('#signup');
        let signin = document.querySelector('#signin');
        let body = document.querySelector('body');
        signup.onclick = function(){
            body.classList.add('signup');
        }
        signin.onclick = function(){
            body.classList.remove('signup');
        }
    </script>
</body>
</html>