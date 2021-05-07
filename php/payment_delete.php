<?php     header('Content-type: text/html; charset=utf-8');

include_once 'db_connect.php';
print_r($_POST);
paymentDelete();
echo '<br><br>Квитанция удалена!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-5" />';

function paymentDelete(){
  global $mysqli;
  $sql='DELETE FROM `festival_payment` WHERE `id`='.$_POST['payment_id'];
  $mysqli->query($sql);
}



?>