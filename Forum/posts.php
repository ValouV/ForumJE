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
            <!-- l'admin peut ici poster un article directement du CRUD en temps que 'admin' -->
            <!-- on utilise le même formulaire que pour postageM -->
                <div class="container">
                    <header class="page-header">
                        <h1>Nouveau post admin</h1>
                    </header>
                    <div class="col-md-6">
                        <form method="post" action="postageM.php" id="postform">
                            <p>
                                Titre du post <input type="text" name="titre" /></br>
                                photo (facultatif) <input type="text" name="photo" /></br>
                                </br>
                                </br>
                            </p>
                        </form>
                    </div>
                    <div class="col-md-6">
                        Votre texte : </br>
                        <textarea name="contenu" rows="10" cols="50" form="postform"></textarea>
                        <input type="submit" value="Valider" form="postform"/>
                    </div>
                </div>
            </div>
            <div class="container"> <header class="page-header"><h1>Posts</h1></header> </div>
            <div class="row">
              <p>Supprimer un post supprime les commentaires associés.</p>
    <?php
    OuvrirBDD();
    $posts = Post::order_by_asc('id')->find_many();
    foreach ($posts as $post) { ?>
      <div class="col-md-12" style="border=1px">
          <p>id:<?php echo $post -> id ?></br>
              titre:<?php echo $post -> titre ?></br>
              pseudo:<?php echo $post -> pseudo ?></br>
              text:<p style=" width: 500px; margin: auto; word-wrap: break-word;"><?php echo $post -> content ?></p></br>
              date:<?php echo $post -> datepost ?></br>
              photo:<?php echo $post -> photo ?></p>

                <form method="post" action="suppost.php?id=<?php echo $post -> id ?>">
                <input type="submit" value="Supprimer" />
                </form>
                </br></br></br></br>

      </div>

    <?php
    }
    ?>
</div>

    <?php
}
?>
</body>
</html>
