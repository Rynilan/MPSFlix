<?php
include '../config/path.php';

$page = $_GET['page'];
$data = [
	'html' => null,
	'css' => ['default.css'],
	'js' => ['menu.js', ]
];

try{
	$arquivo = ROOT_PATH.'html/'.$page.'.html';
	if (!file_exists($arquivo)) {
		throw new Exception("Erro arquivo não existe");
	}

	$data['html'] = file_get_contents($arquivo);
	switch ($page) {
		case 'login':
			array_push($data['css'], 'form');
			array_push($data['js'], 'login');
			break;

		case 'main':
			array_push($data['css'], 'main_page');
			array_push($data['js'], 'titulo');
			array_push($data['js'], 'redirect');
			array_push($data['js'], 'loadMedia');
			break;

		case 'reprodutor':
			array_push($data['css'], 'reprodutor');
			array_push($data['js'], 'loadMediaInfo');
			break;

		case 'error':
			array_push($data['css'], 'error');
			array_push($data['js'], 'home');
			break;

		case 'info':
		// Add the css and js to the 
		    break;

		default:
			break;
	}
} catch (Exception $erro) {
	header('Location: '.ROOT_URL.'page/error.php?code_error=404'); 
	exit();
}

echo json_encode($data);
?>
