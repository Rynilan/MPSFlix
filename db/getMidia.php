<?php
include 'conexao.php';
$query = $conexao->query("select nome from tb_filmes union select nome from tb_series order by nome;");

$index = 0;
$data = [];
if ($query) {
	while ($linha = $query.fetch_assoc()) {
		$data[$index] = $linha;
		$index += 1;
	}
}

$conexao->close();
?>
