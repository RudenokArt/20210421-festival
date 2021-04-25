<?php 
include_once 'db_connect.php';
fileUpload();
print_r($_FILES);

function getExpand(){
  return(explode('.', $_FILES[array_keys($_FILES)[0]]['name'])[1]);
}
function fileUpload(){
  $fileName=(array_keys($_FILES)[0]);
  move_uploaded_file(
    $_FILES[$fileName]['tmp_name'],
    '../user_upload/'.$fileName.'.'.getExpand());
  fileRegister($fileName);
}
function fileRegister($fileName){
  $fileName=strtr($fileName, '_', ' ');
  global $mysqli;
  $arr=explode('!!', $fileName);
  $sql='UPDATE `festival_participant` 
  SET `'.$arr[2].'`="'.$fileName.'.'.getExpand().'" WHERE `id`='.$arr[0];
  $mysqli->query($sql);
  //print_r($sql);
}








?>