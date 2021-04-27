<?php 
include_once 'db_connect.php';
session_start();





function getUserOrchestra($number){
  global $mysqli;
  $sql=$mysqli->query('SELECT * FROM `festival_user_category` 
    WHERE `user`="'.$_SESSION['id'].'" AND `category`="'.$number.'"');
  $arr=[];
  while ($item=mysqli_fetch_assoc($sql)) {
    array_push($arr, $item);
  }
  return $arr;
}






?>