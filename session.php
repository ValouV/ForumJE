<?php
include('fonctions.php');
Demarrer();
?>

<html>

    <head>
        <meta charset="utf-8">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
            <title>Forum - Gestion de session</title>
    </head>

    <body>


    <?php Head(); ?>

        <div class="container">
            <header class="page-header">
                <h1>Gérez votre compte ici</h1>
            </header>
            <div class="row">
                <section class="col-md-6">
                  <legend>Si vous êtes <strong>déjà inscrit</strong> veuillez entrer votre nom et mot de passe</legend>
                  <form method="post" action="traitement.php" id="1" data-toogle="validator" role="form">
                        <label class="col-md-3 control-label" for="textinput">Pseudo</label>
                          <div class="col-md-9">
                          <input id="textinput1" name="name" type="text" class="form-control input-md" minlength="2" maxlength="30" required>
                          </div>
                          <label class="col-md-3 control-label" for="passwordinput">Mot de passe</label>
                          <div class="col-md-9">
                            <input id="pa1" name="mdp" type="password" class="form-control input-md" minlength="6" maxlength="30" required>
                          </div>
                          <div class="col-md-12">
                          <input type="submit" class="btn btn-info btn-lg" role="button" value="Connexion" style="margin-top=30px;"/>
                        </div>
                  </form>
                </section>

                <section class="col-md-6">
                  <legend>Si vous êtes <strong>nouveau sur le forum</strong> veuillez entrer vos informations</legend>
                  <form data-toogle="validator" role="form" method="post" action="nvcompte.php" id="2">
                        <label class="col-md-3 control-label" for="textinput">Pseudo</label>
                          <div class="col-md-9">
                          <input id="textinput2" name="name" type="text" class="form-control input-md" minlength="2" maxlength="30" required>
                          </div>

                          <label class="col-md-3 control-label" for="passwordinput">Mot de passe</label>
                          <div class="col-md-9">
                            <input id="pa2" name="mdp" type="password" class="form-control input-md" minlength="6" maxlength="30" required>
                          </div>

                          <label class="col-md-3 control-label" for="textinput">Email</label>
                            <div class="col-md-9">
                            <input id="textinput3" name="mail" type="email" class="form-control input-md" required>
                            </div>

                          <label class="col-md-3 control-label" for="textinput">Confirmation email</label>
                              <div class="col-md-9">
                              <input id="textinput4" name="mail2" type="email" class="form-control input-md" match="[id='textinput3']" data-match-error="Whoops, these don't match" required>
                              </div>
                          <div class="col-md-12">
                          <input type="submit" class="btn btn-info btn-lg" role="button" value="Inscription" style="margin-top=30px;"/>
                        </div>
                  </form>
                </section>
            </div>

            <script>
              $(function() {
                $('form[id="2"]').submit(function() {
                  var mail1 = $('input[id="textinput3"]');
                  var mail2 = $('input[id="textinput4"]');
                  if(($.trim($(mail1).val()))!=($.trim($(mail2).val()))) {
                      alert("La confirmation de mail ne correspond pas");
                      return false;
                    }
                      return true;
                   });


              });
            </script>



    </body>
</html>
