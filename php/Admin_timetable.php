<?php 
include_once 'db_connect.php';
Admin_timetable::add_new_date();
Admin_timetable::festival_date_delete();

class Admin_timetable {

  public static function add_new_date () {
    if (isset($_GET['festival_add_new_date'])) {
      global $mysqli;
      $sql = $mysqli->query('INSERT INTO `festival_dates`(`date`) 
        VALUES ("'.$_GET['festival_add_new_date'].'")');
      echo "<meta http-equiv='refresh' content='0;url=admin_app.php?page=admin_timetable'>";
    }
  }

  public static function get_dates_list () {
    $arr = [];
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_dates` ORDER BY `date`');
    while ($dates=mysqli_fetch_assoc($sql)) {
      array_push($arr, $dates);
    }
    return $arr;
  }

  public static function festival_date_delete () {
    if (isset($_GET['festival_date_delete'])) {
      global $mysqli;
      $sql = $mysqli->query('DELETE FROM `festival_dates` WHERE `id`='.$_GET['festival_date_delete']);
      echo "<meta http-equiv='refresh' content='0;url=admin_app.php?page=admin_timetable'>";
    }
  }

  

}



?>