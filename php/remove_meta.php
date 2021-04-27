<?php 
include_once 'db_connect.php';
print_r($_POST);

removeMeta();
echo '<br><br>Категория удалена';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-3" />';



function removeMeta(){
  global $mysqli;
  $sql='DELETE FROM `festival_meta` WHERE id='.$_POST['remove_meta'];
  $mysqli->query($sql);
}





?>