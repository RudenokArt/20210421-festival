<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
print_r($_POST);
priceAdd();
echo '<br><br>Прайс добавлен в базу!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-4" />';


function priceAdd(){
  global $mysqli;
  foreach ($_POST as $key => $value) {
    if ($key!='price_date') {
      $arr=explode('||', $key);
      $sql='INSERT INTO `festival_price`(`date`, `meta_type`,`meta`, `price`) 
      VALUES ("'.$_POST['price_date'].'","'.$arr[0].'","'.$arr[1].'","'.$value.'")';
      $mysqli->query($sql);
    }
  }
}
?>