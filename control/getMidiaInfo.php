<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$tipo = $_GET['tipo'];
$id = $_GET['id'];

include '../db/getMidiaInfo.php';

echo json_encode($media_data);
?>
