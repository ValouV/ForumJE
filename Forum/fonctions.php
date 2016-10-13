<?php
Function Head(){
  ?>
  <meta name="viewport" content="width=device-width, user-scalable=false;">
  <nav class="navbar navbar-default navbar-fixed-top navigateur" role="navigation"> <!--barre de navigation -->
            <div class="container-fluid navigateur">
                <div class="navbar-header navigateur">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigateur1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">LE FORUM</a>
                </div>
                <div class="collapse navbar-collapse " id="navigateur1">
                <ul class="nav navbar-nav">
                    <li class="active"> <a href="index.php">Accueil</a> </li>
                    <li> <a href="post.php">Nouveau post</a> </li>
                </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($_SESSION != null) { ?>
                            <li><a data-toggle="dropdown" href="session.php">Membre : <?php echo $_SESSION['pseudo']; ?>  <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="deco.php">Déconnexion</a></li>
                                <li><a href="session.php">Autres comptes</a></li>
                                <?php if ($_SESSION['pseudo'] == 'admin') { ?> <li><a href="CRUD.php">CRUD</a></li> <?php } ?>
                              </ul>
                            </li>
                        <?php } else { ?>
                            <li><a href="session.php"> <?php echo 'Non connecté'; ?> </a></li>
                        <?php } ?>
                    </ul>

              </div>
            </div>
        </nav>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js "></script>
        <?php
}

Function Demarrer(){
session_start();
date_default_timezone_set('Europe/Paris');

}

Function OuvrirBDD(){
require_once 'assets/idiorm.php';
require_once 'assets/paris.php';

ORM::configure('mysql:host=fdb3.biz.nf;dbname=2210575_forum;charset=utf8;');
ORM::configure('username', '2210575_forum');
ORM::configure('password', 'azeazeaze1');

class User extends Model {
  public static $_table = 'membres';
}

class Post extends Model {
  public static $_table = 'post';
}

class Comt extends Model {
  public static $_table = 'com';
}

}

?>
