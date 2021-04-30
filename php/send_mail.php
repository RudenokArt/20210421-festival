<?php     header('Content-type: text/html; charset=utf-8');
session_start();
function sendMail($text,$subject,$receiver){
  $Text=$text;
  $Subject=$subject;
  $Receiver=$receiver;
  include_once '../php_mail/index.php';
}

function send_mail_update_user_data(){
  $str='';
  foreach ($_POST as $key => $value) {
    $str=$str.$key.' : '.$value.'<br>';
  }
  $subject='Изменение профиля участника';
  $text='Новые данные участника № '.$_SESSION['id'].':<br>'.$str;
  $receiver=trim(file_get_contents('../data/admin_mail.txt'));
  sendMail($text,$subject,$receiver);
}

?>