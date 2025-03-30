<?php
try {
	include '../config/path.php';
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$stdout = shell_exec(escapeshellcmd('python3 '.escapeshellarg(ROOT_PATH.'db/getUserData.py').' '.escapeshellarg($email).' '.escapeshellarg($senha).' ;'));
	$data = json_decode($stdout, true);


	if (isset($data['sucesso']) && $data['sucesso']) {
		session_start();
		$_SESSION['email'] = $data['email'];
		$_SESSION['nome'] = $data['nome'];
		$_SESSION['autenticado'] = $data['sucesso'];
	}
} catch (Exception $erro) {
	$data = [
		'mensagem' => $erro->getMessage(),
		'sucesso' => false,
		'nome' => '',
		'email' => ''
	];
}
echo json_encode($data);
?>

