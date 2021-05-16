<?php     //header('Content-type: text/html; charset=utf-8');


include_once 'db_connect.php';
userRemove();


function get_users_data(){
  global $mysqli;
  $arr=[];
  $sql = $mysqli->query('SELECT * FROM `festival_participant` 
    ORDER BY `id`');
  while ($users=mysqli_fetch_assoc($sql)) {
    array_push($arr, $users);
  }
  return $arr;
}

function userRemove(){
  global $mysqli;
  if (isset($_POST['delete_user_id'])) {
    print_r($_POST);
    $mysqli->query('DELETE FROM `festival_participant` 
    WHERE `id`="'.$_POST['delete_user_id'].'"');
    echo '<br><br>Пользователь удален!';
     if (unlink('../user_upload/'.$_POST['certificate'])){
      echo '<br><br>Сертификат удален!';
    }
    if (unlink('../user_upload/'.$_POST['photo'])){
      echo '<br><br>ФОТО удалено!';
    }
    echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-9" />';
  }
}


?>