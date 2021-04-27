<?php 
include_once 'db_connect.php';
session_start();
print_r($_POST);
setUserOrchestra();
echo '<br><br>Данные отправлены на сервер!';
echo '<meta http-equiv="refresh" content="2; url=../user.php#tabs-3" />';



function setUserOrchestra(){
  global $mysqli;
  foreach ($_POST as $key => $value) {
    $sql='UPDATE `festival_user_category` 
    SET `orchestra`="'.$value.'" 
    WHERE `category`="'.$key.'" AND `user`="'.$_SESSION['id'].'"';
    $mysqli->query($sql);
  }
}






?>