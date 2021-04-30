<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
session_start();





function getUserCategory(){
  global $mysqli;
  $sql=$mysqli->query('SELECT * FROM `festival_user_category` 
    WHERE `user`="'.$_SESSION['id'].'"');
  $arr=[];
  while ($item=mysqli_fetch_assoc($sql)) {
    array_push($arr, $item['category']);
  }
  return $arr;
}






?>