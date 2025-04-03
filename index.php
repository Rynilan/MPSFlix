<?php 
include 'config/path.php';
session_start();
$_SESSION['email'] = null;
$_SESSION['nome'] = null;
$_SESSION['autenticado'] = false;
header('Location: '.ROOT_URL.'page/login.php'); 
exit();
?>
