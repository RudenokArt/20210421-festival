<?php 
include_once 'db_connect.php';
Admin_nomination_list::admin_nomination_list_add ();
print_r($_POST);

/**
 * 
 */
class Admin_nomination_list {
  
  public static function admin_nomination_list_add () {
    if (isset($_POST['admin_nomination_list_add'])) {
      global $mysqli;
      $mysqli->query('INSERT INTO `festival_nomination_list`(`nomination`, `participant`) 
        VALUES ("'.$_POST['nomination_id'].'", "'.$_POST['user_id'].'")');
      echo 'INSERT INTO `festival_nomination_list`(`nomination`, `participant`) 
        VALUES ("'.$_POST['nomination_id'].'", "'.$_POST['user_id'].'")';
        echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_nomination_list'>";
    }
  }
  
}


?>