<?php
$tipo = $_GET['tipo'];
$id = $_GET['id'];

include '../db/getMidiaInfo.php';

echo json_encode($media_data);
?>
