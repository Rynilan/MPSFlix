<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

include '../db/autenticar.php';

echo json_encode($resultado);
?>

