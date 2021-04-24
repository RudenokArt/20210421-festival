<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
$email=$_POST['email'];
$password=$_POST['password'];
$sql='SELECT * FROM `festival_participant` WHERE email="'.$email.'"';
$mailCheck=mysqli_fetch_array($mysqli->query($sql));
$data=[];
 session_start();
if ($mailCheck!=null) {
  $_SESSION['login']=false;
  $_SESSION['id'] = null;
  $data[0]=false;
  $data[1]='Пользователь с таким Email <br> уже зарегистрирован!';
}else{
  $sql='INSERT INTO `festival_participant` (`password`,`email`)
  VALUES ("'.$password.'","'.$email.'")';
  $mysqli->query($sql);
  $sql='SELECT * FROM `festival_participant` 
  WHERE email="'.$email.'" AND password="'.$password.'"';
  $arr=mysqli_fetch_array($mysqli->query($sql));
  if (sizeof($arr)>0) {
    $_SESSION['login']=true;
    $_SESSION['id'] = $arr['id'];
    $data[0]=true;
    $data[1]='Регистрация прошла успешно!';
  }
}
$json=json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo $json;





?>