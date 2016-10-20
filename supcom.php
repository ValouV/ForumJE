<?php
include('fonctions.php');
Demarrer();

        if ($_SESSION['pseudo'] != "admin") { //si le mdp n'est pas bon
            ?>
            <h1>Vous n'êtes pas administrateur, veuillez retourner à la <a href="index.php">page d'acceuil</a></h1>
            <?php
        } else { //si le mdp est bon
          OuvrirBDD();
            $com = Comt::find_one($_GET['id']);
            $com -> delete();
            header("Location: com.php");
        }
        ?>
