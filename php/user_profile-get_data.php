<?php 
include_once 'db_connect.php';
function getUserData(){
  global $mysqli;
   $userId=$_SESSION['id']; 
  $sql = $mysqli->query('SELECT * FROM `festival_participant` 
    WHERE id='.$_SESSION['id']);
  return mysqli_fetch_array($sql);
}






?>