<?php
include('fonctions.php');
Demarrer();

        OuvrirBDD();
        if ($_SESSION != null) {
        $okpost = ((strip_tags($_POST['titre'])) == '' || (strip_tags($_POST['contenu'])) == '');

        if (!$okpost) { //Si les contenus ne sont pas vides
            //On insere le nouveau post dans la liste
            $post = Post::create();
            $post -> membre = $_SESSION['id'];
            $post -> content = strip_tags($_POST['contenu']);
            $post -> titre = strip_tags($_POST['titre']);
            $post -> photo = strip_tags($_POST['photo']);
            $post -> datepost = date("Y-m-d H:i:s");
            $post -> save();

            $id = $post -> id;
            header("Location: article.php?idart=$id");


            //$req->closeCursor(); //on ferme la BDD
        }
        }
        ?>
