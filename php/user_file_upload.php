<?php     header('Content-type: text/html; charset=utf-8');
print_r($_FILES);
?><br><?
print_r($_POST);
userFileUpload();

include_once 'send_mail.php';
send_mail_update_user_data();

echo '<br><br>ФАЙЛ ЗАГРУЖЕН НА СЕРВЕР!';
echo '<meta http-equiv="refresh" content="2; url=../user.php#tabs-3" />';


function userFileUpload(){
  $expand=explode('.', $_FILES['track']['name'])[1];
  $fileName=
  $_POST['user'].'!!'.$_POST['track_name'].'!!'.$_POST['track_type'].'.'.$expand;
  move_uploaded_file($_FILES['track']['tmp_name'], '../user_upload/'.$fileName);
}



?>