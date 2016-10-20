<?php
include('fonctions.php');
Demarrer();
?>

<html>

    <head>
        <meta charset="utf-8">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
            <title>Forum - Nouveau post</title>
    </head>

    <body>

    <?php Head(); ?>


<?php if ($_SESSION == null) { ?>
            <div class="jumbotron">
                <div class="container">
                    <h1>Nouveau post impossible</h1>
                    <p>Pour écrire un post il faut être connecté au site ! Retournez à <a href="index.php"> la page d'accueil</a>
                        ou directement a la <p><a class="btn btn-info btn-lg" href="session.php" role="button">Page de connexion <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p></p>
                </div>
            </div>
<?php } else { ?>

            <div class="container">
                <header class="page-header">
                    <h1>Nouveau fil de discussion</h1>
                </header>
                <div class="row">
                    <h4>Votre pseudo sera affiché sur le post alors attention à ce que vous écrivez <strong><?php echo $_SESSION['pseudo']; ?></strong></h4></br>
                </div>
                <div class="row-offset-1 form-group">
                    <div class="col-md-6">
                        <form method="post" action="postageM.php" id="postform" data-toogle="validator" role="form">
                              <label class="col-xs-3 control-label" for="textinput">Titre article</label>
                                <div class="col-md-9">
                                <input id="textinput" name="titre" type="text" class="form-control input-md" required>
                                </div>
                                <label class="col-md-3 control-label" for="selectbasic">Photo</label>
                                <div class="col-md-9">
                                <select id="selectbasic" name="photo" class="form-control">
                                  <option value="frites.png">Frites</option>
                                  <option value="avion.jpg">Avion</option>
                                  <option value="" selected>Aucune photo</option>
                                </select>
                                <span class="help-block">Seules 2 photos sont accessibles pour le moment</span>
                                </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md-3 control-label" for="textarea">Votre texte</label>
                    <div class="col-md-9">
                      <textarea class="form-control" id="texta" name="contenu" rows="10" cols="50" form="postform" required></textarea>
                    </div>
                    </div>
                </div>
                <div class="row col-xs-12">
                <input type="submit" value="Poster l'article" form="postform" class="btn btn-info btn-lg" role="button"/></br></br>
                <p>Quelles règles sont à respecter pour publier
            <ul>
                <li>Pas de language chatier</li>
                <li>Pas d'insultes </li>
                <li>Uniquement des discours intelligents</li>
            </ul>
                En appuyant sur poster l'article vous vous engagez à respecter cette règle.</p>
                </div>


<?php } ?>
    </body>
</html>
