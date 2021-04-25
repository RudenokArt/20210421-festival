<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$sql='SELECT * FROM `festival_participant` 
WHERE email="'.$email.'" AND password="'.$password.'"';
$arr=mysqli_fetch_array($mysqli->query($sql));
$data=[];
if ($arr!=null) {
  $_SESSION['login']=true;
  $_SESSION['id'] = $arr['id'];
  $data[0]=true;
  $data[1]='Авторизация прошла успешно!';
}else{
  $_SESSION['login']=false;
  $_SESSION['id'] = null;
  $data[0]=false;
  $data[1]='Неверный логин или пароль!';
}
$json=json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo $json;
?>