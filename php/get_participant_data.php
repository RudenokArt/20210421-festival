<?php     
include_once 'db_connect.php';

$sql='SELECT * FROM `festival_participant`';
$sql=$mysqli->query($sql);
$tr=[];
while ($result = mysqli_fetch_array($sql)){
  array_push($tr, $result);
}
$th=[];
$flag=false;
foreach ($tr[0] as $key => $value) {
  if ($flag) {array_push($th, $key);}
  if (!$flag) {$flag=true;}else{$flag=false;}
}

?>