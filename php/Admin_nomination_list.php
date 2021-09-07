<?php 
include_once 'db_connect.php';
Admin_nomination_list::add_item ();
Admin_nomination_list::delete_item ();

/**
 * 
 */
class Admin_nomination_list {

  public static function add_item () {
    if (isset($_POST['nomination_list_add_item'])) {
      global $mysqli;
      $mysqli->query(
        'INSERT INTO `festival_nomination_list`(`nomination`, `participant`) 
        VALUES ("'.$_POST['nomination_id'].'", "'.$_POST['user_id'].'")');
       echo "<meta http-equiv='refresh'content='0;url=../admin_app.php?nomination_id=".$_POST['nomination_id']."&page=admin_nomination_list&nomination_filter=".$_POST['nomination_filter']."'>";
    }
  }

  public static function get_list ($item_id) {
    $arr = [];
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_nomination_list`  
      WHERE `nomination`="'.$item_id.'"');
    while ($item=mysqli_fetch_assoc($sql)) {
      array_push($arr, $item);
    }
    return $arr;
  }

  public static function get_nomination ($item_id) {
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_nominations` 
      WHERE `id`="'.$item_id.'"');
    while ($item=mysqli_fetch_assoc($sql)) {
      $arr = $item;
    }
    return $arr;
  }

  public static function get_participant ($item_id) {
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_participant` 
      WHERE `id`="'.$item_id.'"');
    while ($item=mysqli_fetch_assoc($sql)) {
      $arr = $item;
    }
    return $arr;
  }

  public static function delete_item () {
    if (isset($_POST['nomination_list_delete_item'])) {
      global $mysqli;
      $mysqli->query('DELETE FROM `festival_nomination_list` 
        WHERE `id`="'.$_POST['nomination_list_delete_item'].'"');
      echo "<meta http-equiv='refresh'content='0;url=../admin_app.php?nomination_id=".$_POST['nomination_id']."&page=admin_nomination_list&nomination_filter=".$_POST['nomination_filter']."'>";
    }
  }

  
}


?>