<?php 

namespace Php;
include_once 'db_connect.php';

class Admin_results {

  public static function get_results () {
    global $mysqli;
    $arr = [];
    $sql = $mysqli->query ('SELECT * FROM `festival_results`');
    while ($item=mysqli_fetch_assoc($sql)) 
    {
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

  public static function average_mark (&$arr_results_table) {
    foreach ($arr_results_table as $key => $value) {
      self::average_mark_set($arr_results_table[$key]);
    }
  }

  public static function average_mark_get ($arr) {
    foreach ($arr as $key => $value) {
      $result_arr['criterion_1'] = $result_arr['criterion_1'] + $value['criterion_1'];
      $result_arr['criterion_2'] = $result_arr['criterion_2'] + $value['criterion_2'];
      $result_arr['criterion_3'] = $result_arr['criterion_3'] + $value['criterion_3'];
      $result_arr['criterion_4'] = $result_arr['criterion_4'] + $value['criterion_4'];
      $result_arr['criterion_5'] = $result_arr['criterion_5'] + $value['criterion_5'];
    }
    $result_arr['criterion_1'] = round($result_arr['criterion_1'] / count($arr),1);
    $result_arr['criterion_2'] = round($result_arr['criterion_2'] / count($arr),1);
    $result_arr['criterion_3'] = round($result_arr['criterion_3'] / count($arr),1);
    $result_arr['criterion_4'] = round($result_arr['criterion_4'] / count($arr),1);
    $result_arr['criterion_5'] = round($result_arr['criterion_5'] / count($arr),1);
    return $result_arr;
  }

  public static function average_mark_set (&$arr) {
    $arr['average_criterion_mark'] = self::average_mark_get($arr);
    $arr['average_mark'] = array_sum($arr['average_criterion_mark'])/count($arr['average_criterion_mark']);

  }

  public static function max_average_mark ($arr_results_table) {
    $max1 = 0;
    $max2 = 0;
    $max3 =0;
    $criterion_1_max = 0;
    $criterion_2_max = 0;
    $criterion_3_max = 0;
    $criterion_4_max = 0;
    $criterion_5_max = 0;
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_mark'] > $max1) {
        $max1 = $value['average_mark'];
      }
    }
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_mark'] > $max2 and $value['average_mark'] < $max1) {
        $max2 = $value['average_mark'];
      }
    }
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_mark'] > $max3 and $value['average_mark'] < $max2) {
        $max3 = $value['average_mark'];
      }
    }
    
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_criterion_mark']['criterion_1'] > $criterion_1_max) {
        $criterion_1_max = $value['average_criterion_mark']['criterion_1'];
      }
    }
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_criterion_mark']['criterion_2'] > $criterion_2_max) {
        $criterion_2_max = $value['average_criterion_mark']['criterion_2'];
      }
    }
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_criterion_mark']['criterion_3'] > $criterion_3_max) {
        $criterion_3_max = $value['average_criterion_mark']['criterion_3'];
      }
    }
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_criterion_mark']['criterion_4'] > $criterion_4_max) {
        $criterion_4_max = $value['average_criterion_mark']['criterion_4'];
      }
    }
    foreach ($arr_results_table as $key => $value) {
      if ($value['average_criterion_mark']['criterion_5'] > $criterion_5_max) {
        $criterion_5_max = $value['average_criterion_mark']['criterion_5'];
      }
    }
    return [
      'max1' => $max1,
      'max2' => $max2,
      'max3' => $max3,
      'criterion_1_max' => $criterion_1_max,
      'criterion_2_max' => $criterion_2_max,
      'criterion_3_max' => $criterion_3_max,
      'criterion_4_max' => $criterion_4_max,
      'criterion_5_max' => $criterion_5_max,
    ];
  }


}




?>