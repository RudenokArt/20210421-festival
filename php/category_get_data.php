<?php 

include_once 'db_connect.php';


function getCategoryData(){
  global $mysqli;
  $sql=$mysqli->query('SELECT * FROM `festival_user_category` 
    WHERE `user`=14');
  $arr=[];
  while ($item=mysqli_fetch_assoc($sql)) {
    array_push($arr, $item);
  }
 return $arr;
}



?>