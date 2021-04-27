<?php 

session_start();
$_SESSION['id']=null;
$_SESSION['login']=null;
session_destroy();
echo 'exit';

?>