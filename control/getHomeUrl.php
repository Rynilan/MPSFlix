<?php
session_start();
include '../config/path.php';
echo json_encode(['url' => ROOT_URL.(($_SESSION['autenticado'])? 'page/main.php': 'index.php')]);
?>
