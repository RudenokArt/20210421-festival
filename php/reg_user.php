<?php 

include_once 'db_connect.php';
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
}


?>