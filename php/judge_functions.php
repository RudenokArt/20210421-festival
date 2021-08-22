<?php 
include_once 'db_connect.php';



// ===== FUNCTIONS =====

function user_login () {
  if (isset(($_POST['user_login']))) {
    $arr=[false,'Invalid email or password!'];
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_judge`');
    while ($result = mysqli_fetch_array($sql)){
      if (
        trim($_POST['email']) == $result['email'] 
        and 
        trim($_POST['password']) == $result['password']) 
      {
        $_SESSION['user_id'] = $result['id'];
        $arr[0] = true;
        $_SESSION['refresh'] = true;
      }
    }
    $_SESSION['judge'] = $arr[0];
    return $arr;
  }
}

function user_signin() {
  if (isset(($_POST['user_signin']))) {
    $arr=[true,''];
    global $mysqli;
    $sql = $mysqli->query('SELECT * FROM `festival_judge`');
    while ($result = mysqli_fetch_array($sql)){
      if ($result['email']==trim($_POST['email'])) {
        $arr[1] = 'The user with this email is already registered!';
        $arr[0] = false;
      }
    }
    if ($arr[0]) {
      $sql = $mysqli->query('
        INSERT INTO `festival_judge`( `email`, `password`) 
        VALUES ("'.trim($_POST['email']).'", "'.trim($_POST['password']).'")');
      $sql = $mysqli->query('SELECT * FROM `festival_judge`');
      while ($result = mysqli_fetch_array($sql)){
        if (
          trim($_POST['email']) == $result['email'] 
          and 
          trim($_POST['password']) == $result['password']) 
        {
          $_SESSION['user_id'] = $result['id'];
          $arr[0] = true;
          $_SESSION['refresh'] = true;
        }
      }
    }
    $_SESSION['judge'] = $arr[0];
    return $arr;
  }
}

function current_judge_data () {
  $arr = [];
  global $mysqli;
  $sql = $mysqli->query('SELECT * FROM `festival_judge`');
  while ($result = mysqli_fetch_assoc($sql)){
    if ($_SESSION['user_id'] == $result['id']) {
      $arr = $result;
    }
  }
  return $arr;
}

function judge_logout () {
  if (isset($_GET['judge_logout'])) {
    $_SESSION['judge'] = false;
    $_SESSION['user_id'] = '';
    $_SESSION['refresh'] = true;
  }
}

function judge_update () {
  if (isset($_GET['judge_update'])) {
    global $mysqli;
    $mysqli->query(
      'UPDATE `festival_judge` 
      SET `name`= "'.$_GET['judge_name'].'"
      WHERE `id`="'.$_SESSION['user_id'].'"');
    $_SESSION['refresh'] = true;
  }
}

?>