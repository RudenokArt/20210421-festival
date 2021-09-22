<?php 

namespace Php;
include_once 'db_connect.php';

class Admin_results {

 public static function get_results () {
  global $mysqli;
  $arr = [];
  $sql = $mysqli->query ('SELECT * FROM `festival_results`');
  while ($item=mysqli_fetch_assoc($sql)) {
   array_push($arr, $item);
 }
 return $arr;
}

public static function normalize_results () {
  $data = self::get_results();
  $arr = [];
  foreach ($data as $key => $value) {
    $arr[$value['nomination']]=[];
  }
  foreach ($data as $key => $value) {
    $arr[$value['nomination']][$value['participant']]=[];
  }
  foreach ($data as $key => $value) {
    $arr[$value['nomination']][$value['participant']][$value['judge']]=[];
  }
  foreach ($data as $key => $value) {

    $arr[$value['nomination']][$value['participant']][$value['judge']]=[
      'criterion_1' => $value['criterion_1'],
      'criterion_2' => $value['criterion_2'],
      'criterion_3' => $value['criterion_3'],
      'criterion_4' => $value['criterion_4'],
      'criterion_5' => $value['criterion_5'],
    ];
  }
  return $arr;
}

public static function average_mark ($arr) {
  foreach ($arr as $key => $value) {
    $result_arr['criterion_1'] = $result_arr['criterion_1'] + $value['criterion_1'];
    $result_arr['criterion_2'] = $result_arr['criterion_2'] + $value['criterion_2'];
    $result_arr['criterion_3'] = $result_arr['criterion_3'] + $value['criterion_3'];
    $result_arr['criterion_4'] = $result_arr['criterion_4'] + $value['criterion_4'];
    $result_arr['criterion_5'] = $result_arr['criterion_5'] + $value['criterion_5'];
  }
  $result_arr['criterion_1'] = $result_arr['criterion_1'] / count($arr);
  $result_arr['criterion_2'] = $result_arr['criterion_2'] / count($arr);
  $result_arr['criterion_3'] = $result_arr['criterion_3'] / count($arr);
  $result_arr['criterion_4'] = $result_arr['criterion_4'] / count($arr);
  $result_arr['criterion_5'] = $result_arr['criterion_5'] / count($arr);
  return $result_arr;
  // return $arr;

}

}




?>