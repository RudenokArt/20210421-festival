<?php 
$packageArr=['mini','midi','maxi','junior','study','all_ws','group'];
$mainMasterPackageArr=['mini','midi','maxi','junior'];
$cdPackageArr=['mini','junior'];
$orchestraPackageArr=['midi','maxi'];
$masterPackageArr=['mini'=>4,'midi'=>6,'maxi'=>8,'junior'=>2,
'study'=>3,'all_ws'=>10000,'group'=>0];

setMainMaster();



function setMainMaster(){
  if (isset($_POST['main_master'])) {
    $master=$_POST['main_master'];
    $master=trim($master);
    file_put_contents('../data/main_master.txt',$master);
    print_r($_POST);
    setOverPocket();
    echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-7" />';
  }
}
function setOverPocket(){
  $str='00';
  foreach ($_POST as $key => $value) {
    if($key!='main_master'){
      $str=$str.'__'.$value;
    }
  }
  file_put_contents('../data/over_pocket.txt',$str);
}

function getMainMaster(){
  $master=file_get_contents('data/main_master.txt');
  $master=trim($master);
  return($master);
}

function getOverPocket(){
  $str=file_get_contents('data/over_pocket.txt');
  $arr=explode('__', $str);
  return $arr;
}





?>
