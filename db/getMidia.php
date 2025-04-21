<?php
include '../config/path.php';
include 'conexao.php';
$query = $conexao->query("
	select id_filme as id, nome, 'filme' as tipo from tb_filmes
    union
    select id_serie as id, nome, 'serie' as tipo from tb_series
	order by nome;
");

$index = 0;
$data = [
    'sucesso' => false,
    'mensagem' => '',
    'midia' => [],
    'base_url' => ROOT_URL
];
if ($query) {
    $data['sucesso'] = true;
	while ($linha = $query->fetch_assoc()) {
		array_push($data['midia'], $linha);
	}
} else {
    $data['mensagem'] = 'Não há dados cadastrados.';
}

$conexao->close();
?>
