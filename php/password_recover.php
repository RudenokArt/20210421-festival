<?php 
include_once 'db_connect.php';
include_once 'send_mail.php';
$sql='SELECT * FROM `festival_participant` WHERE `email`="'.$_POST['data'].'"';
$data=$mysqli->query($sql);
$user=mysqli_fetch_assoc($data);
echo $user['email'];
sendMail('Пароль: '.$user['password'],'Восстановление пароля',$user['email']);


?>