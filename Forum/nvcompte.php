<?php
include('fonctions.php');
Demarrer();

  OuvrirBDD();

        //On récupère l'id utilisateur ayant le même pseudo
        $AEuser = User::where('pseudo',strip_tags($_POST['name']))->find_one();
        if ($AEuser) { //Si cet id existe alors le membre ne peut pas exister on vérifie aussi que l'utilisateur a entré les infos
            ?>

            <h1>Ce pseudo est déjà utilisé ...</h1>
            <p>Pour revenir en arrière et réessayer avec un autre pseudo<a href="session.php ?>">cliquez ici</a></p>
            <?php
          }  else {
            //On insere le nouveau membre dans la liste
            $nvuser = User::create();
            $nvuser -> pseudo = strip_tags($_POST['name']);
            $nvuser -> mdp = strip_tags($_POST['mdp']);
            $nvuser -> email = strip_tags($_POST['mail']);
            $nvuser -> save();


            $_SESSION['id'] = $nvuser -> id;
            $_SESSION['pseudo'] = $nvuser -> pseudo;
            header('Location: index.php');
        }
        ?>
