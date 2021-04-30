<?php 

$db_host = "localhost"; // Подключаемся к базе
$db_user = "e25532i4_db"; // Логин БД
$db_password = "beget_DB-1"; // Пароль БД
$db_base = 'e25532i4_db'; // Имя БД
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
if ($mysqli->connect_error) 
{die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);}
$mysqli->set_charset("utf8");// Кодировка бд






?>