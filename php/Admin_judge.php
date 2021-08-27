<?php 

include_once 'db_connect.php';


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
    if (isset($_POST['judge_delete'])) {
      global $mysqli;
      $mysqli->query('DELETE FROM `festival_judge` WHERE `id`='.$_POST['judge_delete']);
      echo '<meta http-equiv="refresh" content="; url=#tabs-1" />';
    }
  }


}




?>