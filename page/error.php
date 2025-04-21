<?php

include '../config/path.php';
$conteudo = file_get_contents(ROOT_PATH.'html/errors/'.$_GET['code_error'].'.html');
include '../base/template.php';

?>
