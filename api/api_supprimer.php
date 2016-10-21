<?php
// bails avec ParisOrm
// du style
$postsDepuisParis = Chat::find_one($_GET['id']);
$postsDepuisParis -> delete();

$postsDepuisParis = Chat::order_by_asc('dateP')->findMany();
// ＿les objets sont des objets PArisORM
// il faut les convertir en array (c'est un bail paris, rien d'important)
$posts = []; // équivalent de = array()
foreach ($postsDepuisParis as $postDepuisParis ) {
  $posts[] = $postDepuisParis->asArray();
}
echo json_encode($posts);
die();
