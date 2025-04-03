<?php

try {
	include '../config/path.php';
	$email = $_POST['email'];
	$senha = $_POST['senha'];

    $resultado['sucesso'] = false;
    $resultado['mensagem'] = '';
    $resultado['nome'] = '';
    $resultado['email'] = '';
	$resultado['url'] = '';

    include '../db/autenticar.php';
    if (isset($data)) {
        if ($data['sucesso']) {
            session_start();
            $_SESSION['email'] = $data['email'];
            $_SESSION['nome'] = $data['nome'];
            $_SESSION['autenticado'] = $data['sucesso'];
            $resultado['sucesso'] = true;
            $resultado['nome'] = $data['nome'];
			$resultado['email'] = $data['email'];
			$resultado['url'] = ROOT_URL.'page/main.php';
        }
    }
} catch (Exception $erro) {
	$resultado = [
		'mensagem' => $erro->getMessage(),
		'sucesso' => false,
		'nome' => '',
		'email' => ''
	];
}
echo json_encode($resultado);
?>

