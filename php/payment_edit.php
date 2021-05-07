<?php     header('Content-type: text/html; charset=utf-8');

include_once 'db_connect.php';
print_r($_POST);
paymentEdit();
echo '<br><br>Квитанция изменена!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-5" />';

function paymentEdit(){
  global $mysqli;
  $sql='UPDATE `festival_payment` 
  SET `date`="'.$_POST['payment_date'].'",`amount`="'.$_POST['payment_amount'].'"
  WHERE `id`='.$_POST['payment_id'];
  $mysqli->query($sql);
}



?>