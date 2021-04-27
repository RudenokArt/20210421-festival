<?php 
include_once'db_connect.php';

userLogin();

function userLogin(){
  $flag=false;
  global $mysqli;
  $sql = $mysqli->query('SELECT * FROM `festival_participant` 
    WHERE email="'.$_POST['email'].'" AND password="'.$_POST['password'].'"');
  while ($user=mysqli_fetch_array($sql)) {
    $id=$user['id'];
    $flag=true;
  }
  if ($flag) {
    session_start();
    $_SESSION['id']=$id;
    $_SESSION['login']=true;
    echo 'true';
  }else{
    echo 'log_pas';
  }
}


?>