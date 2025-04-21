<?php
session_start();
include '../config/path.php';

if ($_SESSION['autenticado']) {
	$conteudo = file_get_contents(ROOT_PATH.'html/main.html');
	$custom_css = [
		['path' => 'css/main_page.css']	
	];
	$custom_js = [
		['path' => 'js/titulo.js'],
        ['path' => 'js/redirect.js'],
		['path' => 'js/loadMedia.js']
	];
} else {
	http_response_code(401);
	header("Location: ".ROOT_URL."page/error.php?code_error=401");
	exit();
}

include ROOT_PATH.'base/template.php';
?>
