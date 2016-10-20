<?php
include('fonctions.php');
Demarrer();
?>

<html>

  <head>
    <meta charset="utf-8">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Forum</title>
  </head>

  <body>
  <?php
    if (($_SESSION==null)||($_SESSION['id'] !=  "1")) //si pas co en temps qu'admin
    {

    ?>
        <H1>Vous n'êtes pas administrateur, veuillez retourner à la <a href="index.php">page d'acceuil</a>
        <?php
    }
    else //si le mdp est bon
    {
Head();
		?>
		<a href="membres.php">table membre</a></br>
		<a href="posts.php">table post</a></br>
		<a href="com.php">table commentaires</a></br></br></br>
		<a href="index.php">retour accueil</a>

		<?php } ?>



  </body>
</html>
