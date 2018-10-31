<?php
require 'connect.php';
$query_single = $pdo->prepare("select * from scenes where id=$id");
$query_single->execute();
while($scenes = $query_single->fetch()){
$scene_name = $scenes['scene_name'];
$scene_text = $scenes['scene_text'];
}
$update_message = $scene_name.' selected';
?>