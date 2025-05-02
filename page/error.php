<?php

include '../config/path.php';
$conteudo = file_get_contents(ROOT_PATH.'html/errors/'.$_GET['code_error'].'.html');
$custom_css = [['path' => 'css/error.css']];
$custom_js = [['path' => 'js/home.js']];
include '../base/template.php';

?>
