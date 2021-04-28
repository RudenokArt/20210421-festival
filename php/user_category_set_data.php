<?php 
include_once 'db_connect.php';
session_start();
print_r($_POST);
setUserCategory();

include_once 'send_mail.php';
send_mail_update_user_data();

echo '<br><br>Данные отправлены на сервер!';
echo '<meta http-equiv="refresh" content="2; url=../user.php#tabs-2" />';



function setUserCategory(){
  global $mysqli;
  $sql='DELETE  FROM `festival_user_category` WHERE `user`="'.$_SESSION['id'].'"';
  $mysqli->query($sql);
  foreach ($_POST as $key => $value) {
    $sql='INSERT INTO `festival_user_category` (`user`, `category`) 
    VALUES ("'.$_SESSION['id'].'","'.$value.'")';
    $mysqli->query($sql);
  }
}






?>