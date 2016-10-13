<?php
include('fonctions.php');
Demarrer();
$articletrouve = false;
?>

<html>

    <head>
        <meta charset="utf-8">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
            <title>Forum</title>
    </head>

    <body>

        <div class="container">
        <?php Head(); ?>


<?php
if (isset($_GET['idart'])) { // On a id article
    OuvrirBDD();
    $article = Post::find_one($_GET['idart']);
    if($article){
        ?>
                    <header class="page-header"><h1><?php echo $article -> titre; ?></h1></header>
                    <div class="row">
                        <h3>Ecrit par <strong><?php
                        $nom = User::find_one($article->membre);
                        echo $nom->pseudo; ?></strong> le <?php echo $article -> datepost; ?></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                                <?php if ($article -> photo != '') { ?>
                                <p><img style="float:right"; src="images/<?php echo $article -> photo; ?>" alt="<?php echo $article -> photo; ?>" /><?php echo $article -> content; ?></p>
                                <?php } else { ?>
                                <p><?php echo $article -> content; ?></p>
                    <?php } ?>
                        </div>
                    </div>
                            <?php
                            $articletrouve = true; }
                        $commentaires = Comt::where('idpub', $_GET['idart'])->order_by_asc('date')->find_many();

                        foreach ($commentaires as $commentaire) {
                          ?><div class="container">
                            <div class="row com">
                              <div class="col-sm-4">
                              <p><Strong><?php $membre = User::find_one($commentaire->idcomt); echo $membre->pseudo ?></Strong>
                              le <?php echo $commentaire -> date; ?></p>
                            </div>
                            <div class="col-sm-8">
                              <p><?php echo $commentaire -> text; ?></br></p></div>
                            </div>
                            </div>
                      <?php  }

                        if ($articletrouve && $_SESSION!=null) { ?>


                          <div class="row">
                              <legend>Nouveau commentaire</legend>
                              <section class="col-md-8">
                                <form method="postC" action="postageC.php" id="postform" data-toogle="validator" role="form">
                                      <label class="col-md-3 control-label" for="contenu">Votre commentaire</label>
                                        <div class="col-md-9">
                                        <textarea class="form-control" id="textarea" name="contenu" rows="10" cols="50" form="postform" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                        <input type="submit" class="btn btn-info btn-lg" role="button" value="Poster"/>
                                        <input type="hidden" value="<?php echo $_GET['idart'] ?>" name="idart" form="postform"/>
                                      </div>
                                </form>
                              </section>

                              <section class="col-md-4">
                                <p>
                                    Votre pseudo sera affiché sur le post alors attention à ce que vous écrivez</br>
                                    </br>
                                    </br>
                                    Quelles règles sont à respecter pour publier
                                <ul>
                                    <li>Pas de language chatier</li>
                                    <li>Pas d'insultes </li>
                                    <li>Uniquement des discours intelligents</li>
                                </ul>
                              </section>

        <?php
    }
}
if (!$articletrouve){ ?>
  <div class="jumbotron"> <!--jumbotron de présentation -->
      <div class="container">
          <h1>Article introuvable</h1>
          <p>Le post que vous demandez n'existe pas</p>
          <p><a   class="btn btn-info btn-lg" href="index.php" role="button">Retournez à l'accueil<span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p>
      </div>
  </div>
 <?php } ?>

        </div>
    </body>
</html>
