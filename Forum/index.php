<?php
include('fonctions.php');
Demarrer();
?>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Le meilleur forum de l'année vous accueille chaleureusement"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet"> <!-- css bootstrap -->
        <link href="style.css" rel="stylesheet"> <!-- css perso -->
            <title>Forum - Le forum de l'ambiance</title>
    </head>

    <body>

        <div class="container">

              <?php Head();
                if(!$_SESSION) {
              ?>

            <div class="jumbotron"> <!--jumbotron de présentation -->
                <div class="container">
                    <h1>Bonjour, bienvenue sur le forum de la bonne ambiance</h1>
                    <p>Vous pouvez voir nous fils de discussion ou si vous le souhaitez vous créer un compte et participer aux discussions</p>
                    <p><a class="btn btn-info btn-lg" href="info.php" role="button">En savoir plus  <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
                </div>
            </div>

            <?php } else { ?>
              <div class="jumbotron"> <!--jumbotron de présentation -->
                  <div class="container">
                      <h1>Quel plaisir de vous revoir <?php echo $_SESSION['pseudo'];?></h1>
                      <p>Créez une nouvelle discussion !</p>
                      <p><a class="btn btn-info btn-lg" href="post.php" role="button">Excellent ça  <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
                  </div>
              </div>

            <?php }  ?>

            <div class="row">
                <section class="col-sm-12">
                    <h2>Nouveaux fils de discussion</h2>
                    <div class="row">
                        <?php
                         OuvrirBDD();
                            //On récupère les 12 articles les plus récents
                            $articles = Post::order_by_desc('datepost')->limit(20)->find_many();
                            foreach ($articles as $article) {
                              ?>
                              <article class="col-md-4 col-sm-6 col-lg-3" style="border-radius:50px; background-color: #defbeb;">
                                  <h3 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $article->titre ?></h3>
                                  <h4 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Ecrit par <strong><?php
                                  $nom = User::find_one($article->membre);
                                  echo $nom->pseudo; ?></strong></br>
                                  le <?php echo $article->datepost ?> </h4>
                                  <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php  echo $article->content ?></br></p>
                                  <p><a href="article.php?idart=<?php echo $article->id ?>">Acces commentaires / Lire plus</a></p>
                              </article>
                                  <?php } ?>
                    </div>
                </section>
            </div>

        </div>


    </body>
</html>
