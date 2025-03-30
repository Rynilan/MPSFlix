<?php 
if (!defined('ROOT_PATH')) {
	include '../config/path.php';
}
$conteudo = file_get_contents(ROOT_PATH.'html/login.html');
if (!$conteudo) {
	unset($conteudo);
}
$custom_css = [['path' => 'css/form.css']];
$custom_js = [['path' => 'js/login.js']];
include ROOT_PATH.'base/template.php'; 
?>
