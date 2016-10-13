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
        if ($_SESSION['pseudo'] != "admin") { //si pas connecté
            ?>
            <H1>Vous n'êtes pas administrateur, veuillez retourner à la <a href="index.php">page d'acceuil</a>
            <?php
        } else { //si connecté
          Head();
            ?>
            <a href="membres.php">table membre</a></br>
        		<a href="posts.php">table post</a></br>
        		<a href="com.php">table commentaires</a></br></br></br>
        		<a href="index.php">retour accueil</a>
            <!-- l'admin peut ici poster un commentaire directement du CRUD en temps que 'admin' -->
            <!-- on utilise le même formulaire que pour postageC -->
                <div class="container">
                    <h4>Nouveau commentaire administrateur</h4>
                    <div class="col-sm-6">
                        <form method="postC" action="postageC.php" id="postform">
                            <p>
                                id du post concerné<input type="text" name="idart" form="postform"/>
                                <input type="submit" value="Valider" form="postform"/>
                            </p>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        Votre commentaire : </br>
                        <textarea name="contenu" rows="10" cols="50" form="postform"></textarea>

                    </div>
                </div>
                <div class="container"> <header class="page-header"><h1>Commentaires postés</h1></header> </div>
    <?php
    OuvrirBDD();
    $commentaires = Comt::order_by_desc('date')->find_many();
    foreach ($commentaires as $commentaire) { ?>
      <div class="col-md-8">
          <p>id:<?php echo $commentaire -> id; ?></br>
              pseudo:<?php echo $commentaire -> idcomt; ?></br>
              com:<p style=" width: 500px; margin: auto; word-wrap: break-word;"><?php echo $commentaire -> text; ?></p></div></br>
              date:<?php echo $commentaire -> date; ?></br>
              idpub:<?php echo $commentaire -> idpub; ?></p>

          <form method="post" action="supcom.php?id=<?php echo $commentaire -> id; ?>">
              <input type="submit" value="Supprimer" />

          </form>
          </br></br></br></br>
      </div>
      <?php
    }


}
?>
    </body>
</html>
