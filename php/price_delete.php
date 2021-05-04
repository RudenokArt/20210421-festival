<?php     header('Content-type: text/html; charset=utf-8');

include_once 'db_connect.php';
print_r($_POST);
priceDelete();
echo '<br><br>Прайс удален!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-4" />';



function priceDelete(){
  global $mysqli;
  $sql='DELETE FROM `festival_price` 
  WHERE `date`="'.$_POST['price_delete'].'"';
  $mysqli->query($sql);
}



?>