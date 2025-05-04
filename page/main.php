<?php
session_start();
include '../config/path.php';

if (!$_SESSION['autenticado']) {
	http_response_code(401);
	header("Location: ".ROOT_URL."page/error.php?code_error=401");
	exit();
}

include ROOT_PATH.'base/template.html';
?>
