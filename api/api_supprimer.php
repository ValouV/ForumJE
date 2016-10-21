<?php
// bails avec ParisOrm
// du style
$postsDepuisParis = Chat::find_one($_GET['id']);
$postsDepuisParis -> delete();
$postsDepuisParis -> save();
die();
