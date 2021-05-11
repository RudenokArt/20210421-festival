<?php     header('Content-type: text/html; charset=utf-8');
include_once 'package_get_data.php';
include_once 'db_connect.php';
print_r($_POST);
priceAdd();
echo '<br><br>Прайс добавлен в базу!';
echo '<meta http-equiv="refresh" content="2; url=../admin.php#tabs-4" />';


function priceAdd(){
  global $packageArr;
  global $mysqli;
  foreach ($_POST as $key => $value) {
    if ($key!='price_date'&& !in_array($key, $packageArr)) {
      $sql=$mysqli->query('SELECT * FROM `festival_meta` WHERE `id`="'.$key.'"');
      while ($metaData=mysqli_fetch_assoc($sql)) {
        print_r($metaData);
        foreach ($metaData as $subkey => $subvalue) {
          if (strlen($subvalue)>1 and $subkey!='id') {
            echo $subkey.' '.$subvalue;
            $subsql='INSERT INTO `festival_price`(`date`,`meta_type`,`meta`,`price`) 
            VALUES ("'.$_POST['price_date'].'","'.$subkey.'","'.$key.'","'.$value.'")';
            $mysqli->query($subsql);
          }
        }
      }  
    }
    if (in_array($key, $packageArr)) {
      $sql='INSERT INTO `festival_price`(`date`, `meta_type`,`meta`, `price`) 
      VALUES ("'.$_POST['price_date'].'","package","'.$key.'","'.$value.'")';
      $mysqli->query($sql);
    }
  }
}


?>