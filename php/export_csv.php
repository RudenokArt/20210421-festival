<?php     header('Content-type: text/html; charset=utf-8');
$arr=json_decode($_POST['data']);
file_put_contents('../data/export.csv', '');
print_r($arr);
$str='';
$test='';
$f=fopen('../data/export.csv','a+');
for ($i=0; $i < sizeof($arr) ; $i++) { 
  fputs($f,"\r\n");
  for ($j=0; $j < sizeof($arr[$i])-1  ; $j++) { 
    if ($j!=1 and $j!=14 and $j!=15) {
      $str = iconv( "UTF-8", "cp1251",  $arr[$i][$j] );
      $str=str_replace("\n", " ", $str);
      fputs($f,$str.';');
      $test=$test.'<br>'.$str;
    }
  }
}
file_put_contents('../data/test.html',$test);
fclose($f);
echo 'Выгрузка данных завершена!';

?>