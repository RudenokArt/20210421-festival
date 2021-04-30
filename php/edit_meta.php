<?php     header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
print_r($_POST);

editMeta();
echo '<br><br>Категория изменена!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-3" />';


function editMeta(){
  global $mysqli;
  if (isset($_POST['master_name'])) {
   $sql='UPDATE `festival_meta` SET 
  `master`="'.$_POST['master_name'].'" 
  WHERE id='.$_POST['meta_id'];
  }
  if (isset($_POST['cd_name'])) {
    $sql='UPDATE `festival_meta` SET 
  `cd`="'.$_POST['cd_name'].'"
  WHERE id='.$_POST['meta_id'];
  }
  if (isset($_POST['orchestra_name'])) {
    $sql='UPDATE `festival_meta` SET 
  `orchestra`="'.$_POST['orchestra_name'].'"
  WHERE id='.$_POST['meta_id'];
  }
  if (isset($_POST['food_name'])) {
    $sql='UPDATE `festival_meta` SET 
  `food`="'.$_POST['food_name'].'"
  WHERE id='.$_POST['meta_id'];
  }
  $mysqli->query($sql);
}





?>