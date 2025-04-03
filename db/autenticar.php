<?php
include 'conexao.php';

$senha = password_hash($senha, PASSWORD_DEFAULT);

$data = $conexao->query('select email, nome, senha from tb_usuarios where email = "'.$email.'";')->fetch_array();
$data['sucesso'] = $data['senha'] === $senha;
unset($senha);
unset($email);

$conexao->close();
?>