<?php 
session_start();
include '../config/path.php';

if ($_SESSION['autenticado']) {
	$conteudo = file_get_contents(ROOT_PATH.'html/reprodutor.html');
	$custom_css = [
		['path' => 'css/reprodutor.css'],
	];
	$custom_js = [
		['path' => 'js/loadMediaInfo.js'],
	];
} else {
	http_response_code(401);
	header("Location: ".ROOT_URL."page/error.php?code_error=401");
	exit();
}
include '../base/template.php';
?>
