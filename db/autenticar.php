<?php
include '../config/path.php';
include 'conexao.php';

$data = $conexao->query('select email, nome, senha from tb_usuarios where email = "'.$email.'";')->fetch_array();
$data['sucesso'] = password_verify($senha, $data['senha']);

unset($senha);
unset($email);

$resultado['sucesso'] = false;
$resultado['mensagem'] = '';
$resultado['url'] = '';

if (isset($data)) {
	if ($data['sucesso']) {
		session_start();
		$_SESSION['email'] = $data['email'];
		$_SESSION['nome'] = $data['nome'];
		$_SESSION['autenticado'] = $data['sucesso'];
		$resultado['sucesso'] = true;
		$resultado['url'] = ROOT_URL.'page/main.php';
	} else {
		$resultado['mensagem'] = 'Usuário ou senha incorretos';
	}
}

$conexao->close();
?>
