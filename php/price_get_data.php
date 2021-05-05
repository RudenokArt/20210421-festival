<?php 

include_once 'db_connect.php';
function priceGetData(){
  global $mysqli;
  $arr=[];
  $sql=$mysqli->query('SELECT * FROM `festival_price`ORDER BY `date`');
  while ($result=mysqli_fetch_array($sql)) {
    array_push($arr, $result['date']);
  }
  $arr=array_unique($arr);
  $price=[];
  foreach ($arr as $key => $value) {
    $price[$value]=[];
    $sql=$mysqli->query('SELECT * FROM `festival_price`WHERE `date`="'.$value.'"');
    while ($result=mysqli_fetch_array($sql)) {
     array_push($price[$value],
      [$result['id'],$result['meta_type'],$result['meta'],$result['price']]) ;
    }
  }
  return $price;
}



?>