<?php
require "./index.php";
$app=new App();
$id=$_REQUEST["id"];
$removeImg=$app->edit($id);
$row=$removeImg->fetch_assoc();
unlink("{$row['img']}");
$app->delete($id);
?>