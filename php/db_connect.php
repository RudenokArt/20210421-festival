<?php 

$db_host = "localhost";

$db_user = "e25532i4_db"; 
$db_password = "beget_DB-1"; 
$db_base = 'e25532i4_db'; 

// $db_user = "m911958r_db"; 
// $db_password = "v6LzFaBv"; 
// $db_base = 'm911958r_db'; 

$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
if ($mysqli->connect_error) 
{die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);}
$mysqli->set_charset("utf8");






?>