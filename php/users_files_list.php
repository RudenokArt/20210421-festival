<?php     //header('Content-type: text/html; charset=utf-8');
include_once 'db_connect.php';
trackDelete();
photoDelete();
certificateDelete();



function userFilesList($user_id){
  $folder=scandir('user_upload');
  $arr=[];
  foreach ($folder as $key => $value) {
    if (explode('!!', $value)[0]==$user_id) {
      array_push($arr,$value);
    }
  }
  return ($arr);
}

function trackDelete(){
  if (isset($_POST['track_delete'])) {
    header('Content-type: text/html; charset=utf-8');
    print_r($_POST);
    if (unlink('../user_upload/'.$_POST['track_delete'])){
      echo '<br><br>Трек удален!';
      echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-8" />';
    }
    else{
      echo '<br><br>Файл не существует!';
      echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-8" />';
    }
  }
}
function photoDelete(){
  global $mysqli;
  if (isset($_POST['photo_delete'])) {
    print_r($_POST);
    $sql='UPDATE `festival_participant` 
    SET `photo`="" WHERE id='.$_POST['user_id'];
    $mysqli->query($sql);
    if (unlink('../user_upload/'.$_POST['photo_delete'])){
      echo '<br><br>ФОТО удалено!';
      echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-8" />';
    }else{
      echo '<br><br>Файл не существует!';
      echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-8" />';
    }
  }
}
function certificateDelete(){
  global $mysqli;
  if (isset($_POST['certificate_delete'])) {
    print_r($_POST);
    $sql='UPDATE `festival_participant` 
    SET `certificate`="" WHERE id='.$_POST['user_id'];
    $mysqli->query($sql);
    if (unlink('../user_upload/'.$_POST['certificate_delete'])){
      echo '<br><br>Сертификат удален!';
      echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-8" />';
    }else{
      echo '<br><br>Файл не существует!';
      echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-8" />';
    }
  }
}

?>