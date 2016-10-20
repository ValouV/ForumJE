<?php

//http://localhost/api.php?action=creer&champ1=val1&champ2=val2`


$message = Chat::create();
$message -> idPOST = $_GET['idP'];
$message -> message = strip_tags($_GET['message']);
$message -> dateP = date("Y-m-d H:i:s");
$message -> save();

$postsDepuisParis = Chat::order_by_asc('dateP')->findMany();
// ＿les objets sont des objets PArisORM
// il faut les convertir en array (c'est un bail paris, rien d'important)
$posts = []; // équivalent de = array()
foreach ($postsDepuisParis as $postDepuisParis ) {
  $posts[] = $postDepuisParis->asArray();
}
echo json_encode($posts);
die();
