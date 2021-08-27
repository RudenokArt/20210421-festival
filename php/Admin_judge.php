<?php 

include_once 'db_connect.php';
Admin_judge::judge_delete();


class Admin_judge {

  public static function get_list () {
    $arr=[];
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_judge` ORDER BY `id`');
    while ($users=mysqli_fetch_assoc($sql)) {
      array_push($arr, $users);
    }
    return $arr;
  } 

  public static function judge_delete() {
    global $mysqli;
    if (isset($_GET['judge_delete'])) {
      $mysqli->query('DELETE FROM `festival_judge` WHERE `id`='.$_GET['judge_delete']);
      echo "<meta http-equiv='refresh' content='0;url=admin_new.php'>";
    }
  }


}




?>