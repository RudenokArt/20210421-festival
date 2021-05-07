<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
print_r($_POST);
paymentAdd();
echo '<br><br>Квитанция добавлена в базу!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-5" />';


function paymentAdd(){
  global $mysqli;
  $sql='INSERT INTO `festival_payment`(`date`, `user_id`, `amount`) 
  VALUES ("'.$_POST['payment_date'].'","'.$_POST['user_id'].'",
  "'.$_POST['payment_amount'].'")';
  $mysqli->query($sql);
}


?>