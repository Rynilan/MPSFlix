<?php 
include 'config/path.php';
session_start();
$_SESSION['email'] = null;
$_SESSION['nome'] = null;
$_SESSION['autenticado'] = false;
include 'page/login.php'; 
?>
