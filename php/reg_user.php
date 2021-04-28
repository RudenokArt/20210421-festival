<?php 

include_once 'db_connect.php';
include_once 'send_mail.php';
validateNewUser();
function validateNewUser(){
  global $mysqli;
  $flag=true;
  $sql = $mysqli->query('SELECT * FROM `festival_participant`');
  while ($user=mysqli_fetch_array($sql)) {
    if ($user['email']==$_POST['email']) {
      $flag=false;
    }
  }
  if (!$flag) {echo 'email';}else{regNewUser();}
}
function regNewUser(){
  global $mysqli;
  $mysqli->query('INSERT INTO `festival_participant`(`password`, `email`) 
    VALUES ("'.$_POST['password'].'","'.$_POST['email'].'")');
    echo 'true';
    $subject='Регистрация участника';
    $text='Новый участник: '.$_POST['email'];
    $receiver=trim(file_get_contents('../data/admin_mail.txt'));
    sendMail($text,$subject,$receiver);
}



?>