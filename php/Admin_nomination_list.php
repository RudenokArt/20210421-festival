<?php 
include_once 'db_connect.php';
Admin_nomination_list::add_item ();
print_r($_POST);

/**
 * 
 */
class Admin_nomination_list {
  
  public static function add_item () {
    if (isset($_POST['nomination_list_add_item'])) {
      global $mysqli;
      $mysqli->query('INSERT INTO `festival_nomination_list`(`nomination`, `participant`) 
        VALUES ("'.$_POST['nomination_id'].'", "'.$_POST['user_id'].'")');
      echo 'INSERT INTO `festival_nomination_list`(`nomination`, `participant`) 
        VALUES ("'.$_POST['nomination_id'].'", "'.$_POST['user_id'].'")';
        echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_nomination_list'>";
    }
  }

  public static function get_list () {
    $arr = [];
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_nomination_list`');
    while ($item=mysqli_fetch_assoc($sql)) {
      array_push($arr, $item);
    }
    return $arr;
  }

  public static function get_nomination ($item_id) {
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_nominations` WHERE `id`="'.$item_id.'"');
    while ($item=mysqli_fetch_assoc($sql)) {
      $arr = $item;
    }
    return $arr;
  }
  
}


?>