<?php
session_start();
include '../config/path.php';

if ($_SESSION['autenticado']) {
	$conteudo = file_get_contents(ROOT_PATH.'html/main.html');
	$custom_css = [];
	$custom_js = [
		['path' => 'js/titulo.js'],
		['path' => 'js/loadMedia.js']
	];
} else {
	$conteudo = file_get_contents(ROOT_PATH.'html/40X/401.html');
}

include ROOT_PATH.'base/template.php';
?>
