<?php
include('fonctions.php');
Demarrer();
?>

<html>

    <head>
        <meta charset="utf-8"></meta>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
            <title>Forum - Nouveau post</title>
    </head>

    <body>

    <?php Head();
    if ($_SESSION == null) { ?>
            <div class="jumbotron">
                <div class="container">
                    <h1>Nouveau post impossible</h1>
                    <p>Pour écrire un post il faut être connecté au site ! Retournez à <a href="index.php"> la page d'accueil</a>
                        ou directement a la <p><a class="btn btn-info btn-lg" href="session.php" role="button">Page de connexion <span class="glyphicon glyphicon glyphicon-hand-right"></span></a></p></p>
                </div>
            </div>
<?php } else { ?>

<div class="container">


      <h1>Chattez en illimité!</h1>
      <div class=row>
        <div class=col-xs-12>
        <form method="post" data-toogle="validator">
          <label class="col-md-3 control-label" for="textinput">Message</label>
            <div class="col-md-9">
          <input id="message" type="text" class="form-control input-md" minlength="2" maxlength="30" required>
            </div>
          <input type="" id="idP" value="<?php echo $_SESSION['id']?>" />
          <input type="hidden" name="action" value="creer" />
          <input id="envoi" class="btn btn-info btn-lg" role="button" value="Envoi"/>
        </form>
        </div>
      </div>
      </div>

      <script>
         $(function(){
           // exécuté au chargement de la page
           $.get('api/api.php?action=index', function(reponse){
             // exécuté une fois qu'on a reçu les données de l'API
             console.log(reponse);
           });
           // exécuté au clic
            $('#envoi').click(function(){
              console.log('Envoi du message');
              var message = $('#message').val();
              var auteur_id = $('#idP').val();
              var action = 'ajouter';
      		      $.get("api/api.php?action=creer&message="+message+"&idP="+auteur_id, function(reponse){
      			  	      console.log(reponse);
                	   }
      		        );
            });
          });
            </script>



<?php } ?>

</html>
