<?php 
$judge_data = Judge_page::get_data();
Judge_page::logout();
Judge_page::judge_update();

/**
 * 
 */
class Judge_page {

  public static function get_data () {
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_judge` WHERE id="'.$_SESSION['judge'].'"');
    while ($users=mysqli_fetch_assoc($sql)) {
      $arr = $users;
    }
    return $arr;
  }

  public static function logout () {
    if (isset($_GET['judge_logout'])) {
      $_SESSION['judge'] = '';
      echo "<meta http-equiv='refresh' content='0;url=judge.php'>";
    }
  }

  public static function judge_update() {
    if (isset($_GET['judge_update'])) {
      global $mysqli;
      $mysqli->query('UPDATE `festival_judge` 
        SET `name`="'.$_GET['judge_name'].'" WHERE id="'.$_SESSION['judge'].'"');
      echo "<meta http-equiv='refresh' content='0;url=judge.php'>";
    }
  }

}


?>