<?php 
session_start();
include '../config/path.php';

if ($_SESSION['autenticado'] || true) {
	$conteudo = file_get_contents(ROOT_PATH.'html/reprodutor.html');
	$custom_css = [
		['path' => 'css/reprodutor.css'],
	];
	$custom_js = [
		['path' => 'js/loadMediaInfo.js'],
	];
} else {
	$conteudo = file_get_contents(ROOT_PATH.'html/40X/401.html');
}
include '../base/template.php';
?>
