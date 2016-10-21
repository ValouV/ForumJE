<?php
// bails avec ParisOrm
// du style
$postsDepuisParis = Chat::find_one($_GET['id']);
$postsDepuisParis -> message = strip_tags($_GET['message']);
$postsDepuisParis -> save();
die();
