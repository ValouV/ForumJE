<?php
include('fonctions.php');
Demarrer();

        if ((isset($_GET['idart'])) && ($_SESSION != null)) { // On a le nom et le prénom
            OuvrirBDD();
            $okpost = ((strip_tags($_GET['contenu'])) == '');
            if (!$okpost) { //Si les contenus ne sont pas vides
                $commentaire = Comt::create();
                $commentaire -> idcomt = $_SESSION['id'];
                $commentaire -> text = strip_tags($_GET['contenu']);
                $commentaire -> idpub = strip_tags($_GET['idart']);
                $commentaire -> date = date("Y-m-d H:i:s");
                $commentaire -> save();
                $id = ($_GET['idart']);
                header("Location: article.php?idart=$id");
            }
        } else {
            ?>

            <h1>Vérifiez d'être bien connectés avant de poster un commentaire</h1>
            <p>Pour vous connecter <a href="session.php">cliquez ici</a></p>
            <p>Pour revenir en arrière <a href="article.php?idart=<?php echo $_GET['idart'] ?>">cliquez ici</a></p>

            <?php
        }
        ?>
