<?php
include('fonctions.php');
Demarrer();

        if ($_SESSION['pseudo'] != "admin") { //si le mdp n'est pas bon
            ?>
            <h1>Vous n'êtes pas administrateur, veuillez retourner à la <a href="index.php">page d'acceuil</a></h1>
            <?php
        } else { //si le mdp est bon

            OuvrirBDD();

            $posts = Post::find_one($_GET['id']);
            foreach ($posts as $post) {
              $idSuppr = $post -> id;
              $post -> delete();
              $commentairesPost = Comt::where('idpub',$idSuppr)->find_many();
                foreach ($commentairesPost as $commentairePost) {
                  $commentairePost -> delete();
                }
            }
            header("Location: posts.php");
        }
        ?>
