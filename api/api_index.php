<?php
// bails avec ParisOrm
// du style
 $postsDepuisParis = Chat::findMany();
// ＿les objets sont des objets PArisORM
// il faut les convertir en array (c'est un bail paris, rien d'important)
$posts = []; // équivalent de = array()
foreach ($postsDepuisParis as $postDepuisParis ) {
  $posts[] = $postDepuisParis->asArray();
}
echo json_encode($posts);
