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
      if ($result['meta_type']=='package') {
       $meta=$result['meta'];
     }else{
      $subSql=$mysqli->query('SELECT `'.$result['meta_type'].'` FROM `festival_meta`
        WHERE `id`="'.$result['meta'].'"');
      while ($subResult=mysqli_fetch_array($subSql)) 
      {
        $meta=$subResult[0];
      }
    }
    array_push($price[$value],
      [$result['id'],$result['meta_type'],$meta,$result['price'],$result['meta']]) ;
  } }
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

function userPriceCreate($user){
  foreach (priceGetData() as $key => $value) {
    if ($key==userPriceSelect($user)) {
      $price=$value;
    }
  }
  return $price;
}

function userPriceSetNomination($user){
  global $userCategoryArr;
  $price=userPriceCreate($user);
  for ($i=0; $i < count($price) ; $i++) { 
    array_push($price[$i],'false');
    $cdCount=0;
    $orchestraCount=0;
    foreach ($userCategoryArr[$user] as $key => $value) {
      if ($value[1]=='package') {
        $userPackage=$value[0];
      }
      if ($value[1]=='cd') {
        $cdCount=$cdCount+1;
      }
      if ($value[1]=='orchestra') {
        $orchestraCount=$orchestraCount+1;
      }
      if ($value[0]==$price[$i][4]) {
        $price[$i][5]='true';
      }
    }
  }
  return [$price,$userPackage,$cdCount,$orchestraCount];
}

function userPriceCheckNomination($user){
  global $mainMasterPackageArr;
  global $cdPackageArr;
  global $orchestraPackageArr;
  global $masterPackageArr;
  $price=userPriceSetNomination($user)[0];
  $userPackage=userPriceSetNomination($user)[1];
  $cdCount=userPriceSetNomination($user)[2];
  $orchestraCount=userPriceSetNomination($user)[3];
  $flag=0;
  $masterFlag=0;
  for ($i=0; $i < count($price) ; $i++) { 
    if ($price[$i][4]==getMainMaster() && in_array($userPackage, 
      $mainMasterPackageArr)) {
      $price[$i][5]='false';
    }
    if (in_array($userPackage,$cdPackageArr)&&$flag<1&&$price[$i][1]=='cd') {
      $price[$i][5]='false';
      $flag=$flag+1;
    }
    if(in_array($userPackage,$orchestraPackageArr)&&
      $orchestraCount<1&&$flag<2&&$price[$i][1]=='cd')
    {
      $price[$i][5]='false';
      $flag=$flag+1;
    }
    if(in_array($userPackage,$orchestraPackageArr)&&
      $orchestraCount>0&&$flag<1&&$price[$i][1]=='cd')
    {
      $price[$i][5]='false';
      $flag=$flag+1;
    }
    if(in_array($userPackage,$orchestraPackageArr)&&
      $orchestraCount>0&&$flag<2&&$price[$i][1]=='orchestra')
    {
      $price[$i][5]='false';
      $flag=$flag+1;
    }
    if($price[$i][1]=='master'&&
      $price[$i][4]!=getMainMaster()&&
      $masterFlag<$masterPackageArr[$userPackage]) 
    {
      $price[$i][5]='false';
      $masterFlag=$masterFlag+1;
    }
  }
  return $price;
}

function userPriceTotal($user){
  $price=userPriceCheckNomination($user);
  $total=0;
  foreach ($price as $key => $value) {
    if ($value[5]=='true') {
      $total=$total+$value[3];
    }
  }
  return $total;
}

function userPriceAmount($user){
  $price=userPriceCheckNomination($user);
  $amount=[];
  foreach ($price as $key => $value) {
    if ($value[5]=='true') {
      array_push($amount, [$value[2],$value[3]]);
    }
  }
  return $amount;
}


?>