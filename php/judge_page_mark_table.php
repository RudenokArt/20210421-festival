<?php 

namespace Php;
include_once 'db_connect.php';

class Judge_page_mark_table {

  public static function mark_set () {
    if (isset($_POST['mark_set'])) {
      global $mysqli;
      $mysqli->query('DELETE FROM `festival_results` WHERE 
        `judge` = "'.$_POST['judge'].'" AND 
        `nomination`="'.$_POST['nomination'].'" AND 
        `participant` = "'.$_POST['participant'].'"');
      $mysqli->query(
        'INSERT INTO `festival_results` (
        `judge`, 
        `nomination`, 
        `participant`, 
        `criterion_1`, 
        `criterion_2`, 
        `criterion_3`, 
        `criterion_4`, 
        `criterion_5`) 
        VALUES (
        "'.$_POST['judge'].'",
        "'.$_POST['nomination'].'",
        "'.$_POST['participant'].'",
        "'.$_POST['criterion_1'].'",
        "'.$_POST['criterion_2'].'",
        "'.$_POST['criterion_3'].'",
        "'.$_POST['criterion_4'].'",
        "'.$_POST['criterion_5'].'")');  
    }
  }

  public static function mark_list () {
    global $mysqli;
    $arr = [];
    $sql = $mysqli->query ('SELECT * FROM `festival_results`');
    while ($item=mysqli_fetch_assoc($sql)) {
     array_push($arr, $item);
   }
   return $arr;
 }

 public static function participants_mark_list ($nomination_id, $judge_id) {
  $data = self::mark_list();
  $arr = [];
  foreach ($data as $key => $value) {
    if ($value['nomination'] == $nomination_id and $value['judge'] == $judge_id) {
      $arr[$value['participant']] = [
        'criterion_1' => $value['criterion_1'],
        'criterion_2' => $value['criterion_2'],
        'criterion_3' => $value['criterion_3'],
        'criterion_4' => $value['criterion_4'],
        'criterion_5' => $value['criterion_5'],
      ];
    }
  }
  return $arr;
 }



}


?>