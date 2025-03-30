<?php
session_start();
echo json_encode([
	'nome' => $_SESSION['nome']
]);
?>
