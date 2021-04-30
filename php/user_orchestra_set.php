<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
session_start();
//print_r($_POST);
setUserOrchestra();

include_once 'send_mail.php';
send_mail_update_user_data();

echo 'Данные отправлены на сервер!';
//echo '<meta http-equiv="refresh" content="2; url=../user.php#tabs-3" />';



function setUserOrchestra(){
  global $mysqli;
  foreach ($_POST as $key => $value) {
    $sql='UPDATE `festival_user_category` 
    SET `orchestra`="'.$value.'" 
    WHERE `category`="'.$key.'" AND `user`='.$_SESSION['id'];
    $mysqli->query($sql);
  }
}






?>