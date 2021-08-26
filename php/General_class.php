<?php 

include_once 'db_connect.php';


class General_class {

  public static function get_table_data ($table) {
    global $mysqli;
    $arr=[];
    $sql = $mysqli->query('SELECT * FROM `'.$table.'` ORDER BY `id`');
    while ($users=mysqli_fetch_assoc($sql)) {
      array_push($arr, $users);
    }
    return $arr;
  } 

}




?>