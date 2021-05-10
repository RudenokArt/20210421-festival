<?php    // header('Content-type: text/html; charset=utf-8');

include_once 'db_connect.php';
function getUsersCategory($user,$category){
  global $mysqli;
  $arr=[];
  $sql = $mysqli->query('SELECT * FROM `festival_user_category` 
    WHERE `user`="'.$user.'" AND `category`="'.$category.'"');
  while ($users=mysqli_fetch_assoc($sql)) {
    array_push($arr, $users);
  }
  return $arr;
}



?>