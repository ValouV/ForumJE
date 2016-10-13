<?php
include('fonctions.php');
Demarrer();

        OuvrirBDD();
        $userco = User::where('pseudo', strip_tags($_POST['name']))->where('mdp', strip_tags($_POST['mdp']))->find_one();

        if (!$userco) { // Si il n'existe pas
            ?>
            <h1>Impossible de retrouver votre combinaison pseudo/mot de passe</h1>
            <p>Pour réessayer <a href="session.php">cliquez ici</a></p>
            <p>Pour revenir à la page d'accueil <a href="index.php">cliquez ici</a></p>
            <?php
        } else { //Si il existe on met id et pseudo dans la session de l'utilisateur
            $_SESSION['id'] = $userco -> id;
            $_SESSION['pseudo'] = $userco -> pseudo;
            header('Location: index.php');
        }
        ?>
