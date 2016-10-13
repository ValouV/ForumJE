<?php
include('fonctions.php');
Demarrer();
?>

<html>

    <head>
        <meta charset="utf-8">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <?php
        if ($_SESSION['pseudo'] != "admin") { //si le mdp n'est pas bon
            ?>
            <H1>Vous n'êtes pas administrateur, veuillez retourner à la <a href="index.php">page d'acceuil</a>
            <?php
        } else { //si le mdp est bon
          Head();
            ?>
            <a href="membres.php">table membre</a></br>
            <a href="posts.php">table post</a></br>
            <a href="com.php">table commentaires</a></br></br></br>
            <a href="index.php">retour accueil</a>

            <!-- l'admin peut ici créer un membre directement du CRUD en temps que 'admin' -->
            <!-- on utilise le même formulaire que pour nvcompte -->
            <!-- l'admin sera déconnecté et connecté en temps que le membre créé -->
                <h3>Nouveau membre</h3>
                <form method="post" action="nvcompte.php">
                    <p>
                        Pseudo<input type="text" name="name" /></br>
                        Mot de passe<input type="text" name="mdp" /></br>
                        Email<input type="text" name="mail" /></br>
                        Confirmez email<input type="text" name="mail2" /></br>
                        <input type="submit" value="Valider" />
                    </p>
                </form>

                </br></br></br>
                <h1><strong>Ne pas supprimer admin</strong></h1>
                <p>Supprimer un membre supprime tout post et commentaire associé</p></br>
    <?php
    OuvrirBDD();
    $membres = User::order_by_asc('id')->find_many();
    foreach ($membres as $membre ) { ?>
      <div class="col-md-4">
          <p>id:<?php echo $membre -> id ?></br>
              pseudo:<?php echo $membre -> pseudo ?></br>
              mdp:<?php echo $membre -> mdp ?></br>
              email:<?php echo $membre -> email ?></p>

          <form method="post" action="supmem.php?id=<?php echo $membre -> id ?>">

              <input type="submit" value="Supprimer" />
              </p>
          </form>
          </br></br></br></br>
      </div>

      <?php
    }


    }

  ?>
    </body>
</html>
