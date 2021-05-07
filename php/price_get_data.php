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

function userPriceSelect($user){
  $arr=[];
  foreach (priceGetData() as $key => $value) {
    array_push($arr, $key);
  }
  $paymentDate=dateConvertor(userPaymentsGetData($user)[0]['date']);
  $priceDate=$arr[0];
  for ($i=0; $i < sizeof($arr) ; $i++) { 
    if (dateConvertor($arr[$i])<=$paymentDate) {
      $priceDate=$arr[$i];
    }
  }
  return $priceDate;
}

function dateConvertor($str){
  $dateArr=explode('-', $str);
  $date=new DateTime();
  $date->setDate($dateArr[0],$dateArr[1],$dateArr[2]);
  return $date;
}

function userPriceGetData($user){
  global $userCategoryArr;
  foreach (priceGetData() as $key => $value) {
    if ($key==userPriceSelect($user)) {
      $price=$value;
    }
  }
  $arr=[];
  $amount=0;
  foreach ($price as $key => $value) {
    if (in_array($value[2], $userCategoryArr[$user])) {
      array_push($arr,[$value[2],$value[3]]);
      $amount=$amount+$value[3];
    }
  }
  $arr=[$amount,$arr];
  return $arr;
}


?>