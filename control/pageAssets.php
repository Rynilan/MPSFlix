<?php
session_start();
include '../config/path.php';

$page = $_GET['page'];
$data = [
	'html' => null,
	'css' => ['default'],
	'js' => ['menu'],
	'title' => ''
];

$arquivo = ROOT_PATH.'html/'.(($page != 'error')? $page:'errors/'.$_GET['code']).'.html';
if (!file_exists($arquivo)) {
	header('Location: '.ROOT_URL.'page/error.php?code_error=404'); 
	exit();
}

$data['html'] = file_get_contents($arquivo);
array_push($data['css'], $page);

switch ($page) {
	case 'login':
		$data['title'] = 'Login';
		array_push($data['js'], 'login');
		break;

	case 'main':
		$data['title'] = 'Bem vindo(a) '.$_SESSION['nome'];
		array_push($data['js'], 'redirect');
		array_push($data['js'], 'loadMedia');
		break;

	case 'reprodutor':
		array_push($data['js'], 'loadMediaInfo');
		break;

	case 'error':
		$code = $_GET['code'];
		switch ($code) {
			case '404':
				$data['title'] = $code.' Not Found';
				break;
			case '401':
				$data['title'] = $code.' Unauthorized';
				break;
			case '403':
				$data['title'] = $code.' Forbiden';
				break;
			default:
				$data['title'] = '500 Internal Server Error';
				break;
		}
		array_push($data['js'], 'home');
		break;

	case 'info':
		// Add the css and js to the info page, yet to be done
		break;
}

echo json_encode($data);
?>
