<?php
session_start();
include '../config/path.php';
if ($_SESSION['autenticado']) {
	$conteudo = file_get_contents(ROOT_PATH.'html/main.html');
} else {
	$conteudo = file_get_contents(ROOT_PATH.'html/40X/401.html');
}
$custom_css = [];
$custom_js = [
	['path' => 'https://accounts.google.com/gsi/client'], /* Google API */
//	['path' => 'https://apis.google.com/js/api.js'],
	['path' => 'js/APILoad.js'],
	['path' => 'js/createBlocks.js'],
	['path' => 'js/getFromRoot.js'],
	['path' => 'js/titulo.js']
];
include ROOT_PATH.'base/template.php';
?>
