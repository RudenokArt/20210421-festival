<?php 
include_once 'db_connect.php';
$arr=[];
$sql=$mysqli->query('SELECT * FROM `festival_price`
  WHERE `date`="'.$_POST['data'].'"');
while ($result=mysqli_fetch_array($sql)) {
  array_push($arr, $result['date']);
}
$str=json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo $str;




?>
