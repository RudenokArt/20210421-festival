<?php 
include_once 'db_connect.php';

print_r($_FILES);
echo '<br>';
print_r($_POST);

if ($_FILES['photo']['name']!='') {
  uploadUserPhoto('photo');
}
if ($_FILES['certificate']['name']!='') {
  uploadUserPhoto('certificate');
}
foreach ($_POST as $key => $value) {
  updateUserData($key,$value);
}

include_once 'send_mail.php';
send_mail_update_user_data();

echo '<br><br>Данные отправлены на сервер!';
echo '<meta http-equiv="refresh" content="2; url=../user.php" />';



// ========== FUNCTIONS ==========

function uploadUserPhoto($fileInput){
  global $mysqli;
  $expand=explode('.', $_FILES[$fileInput]['name'])[1];
  $fileName=$fileInput.'!!'.$_POST['user_id'].'!!'.$_POST['fio'].'.'.$expand;
  $sql='UPDATE `festival_participant` 
  SET `'.$fileInput.'`="'.$fileName.'" WHERE id='.$_POST['user_id'];
  $mysqli->query($sql);
  move_uploaded_file($_FILES[$fileInput]['tmp_name'], '../user_upload/'.$fileName);
}
function updateUserData($key,$value){
  global $mysqli;
  $sql='UPDATE `festival_participant` 
  SET `'.$key.'`="'.trim($value).'" WHERE id='.$_POST['user_id'];
  $mysqli->query($sql);
}


?>