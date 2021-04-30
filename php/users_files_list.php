<?php     //header('Content-type: text/html; charset=utf-8');


function userFilesList($user_id){
  $folder=scandir('user_upload');
  $arr=[];
  foreach ($folder as $key => $value) {
    if (explode('!!', $value)[0]==$user_id) {
      array_push($arr,$value);
    }
  }
  return ($arr);
}



?>