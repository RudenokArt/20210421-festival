<?php 

include_once 'db_connect.php';
Admin_timetable::add_new_date();
Admin_timetable::festival_date_delete();
Admin_timetable::festival_add_new_hall();
Admin_timetable::festival_hall_delete();
Admin_timetable::festival_add_new_part();
Admin_timetable::festival_part_delete();
Admin_timetable::fistival_nomination_add();
Admin_timetable::festival_nomination_delete();
Admin_timetable::edit_date();
Admin_timetable::edit_hall();
Admin_timetable::edit_part();
Admin_timetable::edit_nomination();

class Admin_timetable {

  public static function add_new_date () {
    if (isset($_GET['festival_add_new_date'])) {
      global $mysqli;
      $sql = $mysqli->query('INSERT INTO `festival_dates`(`date`) 
        VALUES ("'.trim($_GET['festival_add_new_date']).'")');
      echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
    }
  }

  public static function edit_date () {
    if (isset($_POST['festival_date_edit'])) {
      global $mysqli;
      $mysqli->query('UPDATE `festival_dates` 
        SET `date`="'.$_POST['festival_date_edit'].'" 
        WHERE `id`="'.$_POST['festival_date_id'].'"');
       echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
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
  public static function get_festival_date ($date_id) {
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_dates` WHERE `id`="'.$date_id.'"');
    while ($date=mysqli_fetch_assoc($sql)) {
     $arr = $date;
   }
   return $arr;
 }

 public static function festival_date_delete () {
  if (isset($_GET['festival_date_delete'])) {
    global $mysqli;
    $sql = $mysqli->query('DELETE FROM `festival_dates` WHERE `id`='.trim($_GET['festival_date_delete']));
    echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
  }
}

public static function festival_add_new_hall () {
  if (isset($_GET['festival_add_new_hall'])) {
    global $mysqli;
    $mysqli->query('INSERT INTO `festival_halls`(`hall`) 
      VALUES ("'.trim($_GET['festival_add_new_hall']).'")');
    echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
  }
}

public static function edit_hall () {
    if (isset($_POST['festival_hall_edit'])) {
      global $mysqli;
      $mysqli->query('UPDATE `festival_halls` 
        SET `hall`="'.$_POST['festival_hall_edit'].'" 
        WHERE `id`="'.$_POST['festival_hall_id'].'"');
       echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
    }
  }

public static function get_halls_list () {
  $arr = [];
  global $mysqli;
  $sql = $mysqli->query('SELECT * FROM `festival_halls`');
  while ($hall = mysqli_fetch_assoc($sql)) {
    array_push($arr, $hall);
  }
  return $arr;
}

public static function get_festival_hall ($hall_id) {
  global $mysqli;
  $sql = $mysqli->query('SELECT * FROM `festival_halls` WHERE `id`="'.$hall_id.'"');
  while ($hall=mysqli_fetch_assoc($sql)) {
   $arr = $hall;
 }
 return $arr;
}

public static function festival_hall_delete () {
  if (isset($_GET['festival_hall_delete'])) {
    global $mysqli;
    $mysqli->query('DELETE FROM `festival_halls` 
      WHERE `id`="'.trim($_GET['festival_hall_delete']).'"');
    echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
  }
}

public static function festival_add_new_part() {
  if (isset($_GET['festival_add_new_part'])) {
    global $mysqli;
    $mysqli->query('INSERT INTO `festival_parts`(`part`) VALUES ("'.trim($_GET['festival_add_new_part']).'")');
    echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
  }
}

public static function edit_part () {
    if (isset($_POST['festival_part_edit'])) {
      global $mysqli;
      $mysqli->query('UPDATE `festival_parts` 
        SET `part`="'.$_POST['festival_part_edit'].'" 
        WHERE `id`="'.$_POST['festival_part_id'].'"');
       echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
    }
  }

public static function get_parts_list () {
  $arr = [];
  global $mysqli;
  $sql = $mysqli->query('SELECT * FROM `festival_parts` ORDER BY `part`');
  while ($part = mysqli_fetch_assoc($sql)) {
    array_push($arr, $part);
  }
  return $arr;
}

public static function festival_part_delete () {
  if (isset($_GET['festival_part_delete'])) {
   global $mysqli;
   $mysqli->query('DELETE FROM `festival_parts` 
    WHERE `id`="'.trim($_GET['festival_part_delete']).'"');
   echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
 }
}

public static function get_festival_part ($part_id) {
  global $mysqli;
  $sql = $mysqli->query('SELECT * FROM `festival_parts` WHERE `id`="'.$part_id.'"');
  while ($part=mysqli_fetch_assoc($sql)) {
   $arr = $part;
 }
 return $arr;
}

public static function fistival_nomination_add () {
  if (isset($_GET['fistival_nomination_add']) and $_GET['fistival_nomination_add']!='') {
    global $mysqli;
    $mysqli->query('INSERT INTO `festival_nominations`(`date`, `hall`, `part`, `nomination`) 
      VALUES ("'.$_GET['date'].'", "'.$_GET['hall'].'", "'.$_GET['part'].'", "'.$_GET['fistival_nomination_add'].'")');
    echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
  }
}

public static function edit_nomination () {
    if (isset($_POST['festival_nomination_edit'])) {
      global $mysqli;
      $mysqli->query('UPDATE `festival_nominations` 
        SET `nomination`="'.$_POST['festival_nomination_edit'].'" 
        WHERE `id`="'.$_POST['festival_nomination_id'].'"');
       echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
    }
  }

public static function get_nominations_list () {
  $arr = [];
  global $mysqli;
  $sql = $mysqli->query('SELECT * FROM `festival_nominations`');
  while ($nomination = mysqli_fetch_assoc($sql)) {
    array_push($arr, $nomination);
  }
  return $arr;
}

public static function normalize_nomination_list () {
  $arr = [];
  $base_arr = self::get_nominations_list();
  foreach ($base_arr as $key => $value) {
    $arr[$value['date']][$value['hall']][$value['part']]=[];
  }
  foreach ($base_arr as $key => $value) {
    array_push($arr[$value['date']][$value['hall']][$value['part']],[
      'id' => $value['id'],
      'nomination' => $value['nomination'] 
    ] );
  }
  return $arr;
}

public static function festival_nomination_delete() {
  if (isset($_GET['festival_nomination_delete'])) {
    global $mysqli;
    $mysqli->query('DELETE FROM `festival_nominations` 
    WHERE `id`="'.trim($_GET['festival_nomination_delete']).'"');
   echo "<meta http-equiv='refresh' content='0;url=../admin_app.php?page=admin_timetable'>";
  }
}


}



?>