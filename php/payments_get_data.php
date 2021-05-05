<?php    


include_once 'db_connect.php';


function paymentsGetData(){
  global $mysqli;
  $arr=[];
  $sql = $mysqli->query('SELECT * FROM `festival_payment` ORDER BY `date`');
  while ($payments=mysqli_fetch_assoc($sql)) {
    array_push($arr, $payments);
  }
  foreach ($arr as $key => $value) {
    $sql = $mysqli->query('SELECT * FROM `festival_participant`
      WHERE `id`="'.$value['user_id'].'"');
    while ($user=mysqli_fetch_assoc($sql)) {
      array_push($arr[$key], $user['fio']);
      array_push($arr[$key], $user['email']);
    }
  }
  return $arr;
}




?>