<?php 
include_once 'db_connect.php';

print_r($_POST);
newMeta();
echo '<br><br>Данные отправлены на сервер!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-3" />';



function newMeta(){
  global $mysqli;
  $sql='INSERT INTO  `festival_meta` (`'.$_POST['meta_type'].'`) 
  VALUES ("'.$_POST['meta_name'].'")';
  $mysqli->query($sql);
}




?>