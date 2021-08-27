<?php 
include_once 'db_connect.php';
Judge_login::registration();
Judge_login::common_login(); 

/**
 * 
 */
class Judge_login {

  public static function registration () {
    if (isset($_POST['judge_signin'])) {
      $arr = [];
      global $mysqli;
      $sql = $mysqli->query('SELECT * FROM `festival_judge` WHERE email="'.$_POST['email'].'"');
      while ($users=mysqli_fetch_assoc($sql)) {
        array_push($arr, $users);
      }
      if (count($arr) > 0) {
        $_SESSION['message'] = "The user with this email is already registered!";
        echo "<meta http-equiv='refresh' content='0'url='judge.php#tabs-2'>"; 
      } else {
        $_SESSION['message'] = "";
        $mysqli->query('INSERT INTO `festival_judge`(`email`, `password`) 
          VALUES ("'.$_POST['email'].'","'.$_POST['password'].'")');
        echo 'INSERT INTO `festival_judge`(`email`, `password`) 
        VALUES ("'.$_POST['email'].'","'.$_POST['password'].'")';
        self::login();        
      }
    }
  }

  public static function login() {
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_judge` WHERE email="'.$_POST['email'].'"');
    while ($users=mysqli_fetch_assoc($sql)) {
      if ($users['email'] == $_POST['email']) {
        $_SESSION['judge'] = $users['id'];
      }
      echo "<meta http-equiv='refresh' content='0'>"; 
    }
  }

  public static function common_login () {
    if (isset($_POST['judge_login'])) {
      $_SESSION['judge']='';
      $_SESSION['message'] = "Incorrect username or password";
      global $mysqli;
      $sql = $mysqli->query('SELECT * FROM `festival_judge` WHERE email="'.$_POST['email'].'"');
      while ($users=mysqli_fetch_assoc($sql)) {
        if ($users['email'] == $_POST['email'] && $users['password'] == $_POST['password']) {
          $_SESSION['message'] = "";
          $_SESSION['judge'] = $users['id'];
        } 
        echo "<meta http-equiv='refresh' content='0'>"; 
      }
    }
  }

}



?>