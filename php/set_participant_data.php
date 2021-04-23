<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';

$str=$_POST['data'];
$data=json_decode($str);
$sql='';
foreach ($data as $key => $value) {
  $sql=$sql.'`'.$key.'`="'.$value.'",';
}
$sql=trim($sql,',');
$sql='UPDATE `festival_participant` SET '.$sql.' WHERE id=1';
$mysqli->query($sql);
echo $sql;
?>