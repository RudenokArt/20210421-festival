<?php     header('Content-type: text/html; charset=utf-8');
$arr=json_decode($_POST['data']);
file_put_contents('../data/export.csv', '');
$str='';
$f=fopen('../data/export.csv','a+');
for ($i=0; $i < sizeof($arr) ; $i++) { 
  fputs($f,"\r\n");
  for ($j=0; $j < sizeof($arr[$i])  ; $j++) { 
    if ($j!=28 and $j!=14 and $j!=15) {
      $str = iconv( "UTF-8", "cp1251",  $arr[$i][$j] );
      fputs($f,$str.';');
    }
  }
}
fclose($f);
echo 'Выгрузка данных завершена!';

?>