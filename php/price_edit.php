<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';

print_r($_POST);
priceEdit();
echo '<br><br>Данные сохранены!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-4" />';




function priceEdit(){
  global $mysqli;
  foreach ($_POST as $key => $value) {
    if ($key!='price_date') {
      $sql='UPDATE `festival_price` SET `price`='.$value.' 
      WHERE `date`="'.$_POST['price_date'].'" AND `meta`="'.$key.'"';
      $mysqli->query($sql);
    }
  }
}





?>