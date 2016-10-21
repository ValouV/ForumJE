<?php

//http://localhost/api.php?action=creer&champ1=val1&champ2=val2`


$message = Chat::create();
$message -> pseudo = $_GET['idP'];
$message -> message = strip_tags($_GET['message']);
$message -> dateP = date("Y-m-d H:i:s");
$message -> save();

die();
