<?php 


include_once 'db_connect.php';
function get_users_data(){
  global $mysqli;
  $arr=[];
  $sql = $mysqli->query('SELECT * FROM `festival_participant`');
  while ($users=mysqli_fetch_assoc($sql)) {
    array_push($arr, $users);
  }
  return $arr;
}



?>