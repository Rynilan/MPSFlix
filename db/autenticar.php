<?php
include 'conexao.php';

$data = $conexao->query('select email, nome, senha from tb_usuarios where email = "'.$email.'";')->fetch_array();
$data['sucesso'] = password_verify($senha, $data['senha']);

unset($senha);
unset($email);
$conexao->close();
?>