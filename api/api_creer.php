<?php

//http://localhost/api.php?action=creer&champ1=val1&champ2=val2`
include('../fonctions.php');
OuvrirBDD();

$message = Chat::create();
$message -> idPOST = $_GET['idP'];
$message -> message = strip_tags($_GET['message']);
$message -> dateP = date("Y-m-d H:i:s");
$message -> save();

// ici on aura un truc du style
// $tache = Tache::create();
// $tache->setX($_GET['X'])
// $tache->setY($_GET['Y'])
// $tache->setZ($_GET['Z'])
// $tache->save()

// et on retourne le json de $tache !
// NB : il faut appeler la méthode toArray de Paris, sinon ça chie
echo json_encode($message->asArray());
// fin des bails
die();
