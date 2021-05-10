<?php     //header('Content-type: text/html; charset=utf-8');

include_once 'db_connect.php';

function masterlList($meta){
  global $mysqli;
  $arr=[];
  $sql = $mysqli->query('SELECT * FROM `festival_meta` WHERE `'.$meta.'` <> ""');
  while ($list= mysqli_fetch_assoc($sql)) {
    array_push($arr, $list);
  }
  return $arr;
}




?>