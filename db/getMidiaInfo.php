<?php
include 'conexao.php';

if ($tipo === 'filme') {
    $sql = "select nome, sinopse, duracao, link from tb_".$tipo."s where id_".$tipo." = ".$id.";";
} else {
	$sql = "SELECT 
            s.nome AS nome,
            s.sinopse AS sinopse,
            e.temporada AS duracao,
            e.numero AS numero,
            e.link AS link
        FROM 
            tb_series AS s
        JOIN 
            tb_episodios AS e ON s.id_serie = e.id_serie
        WHERE 
            s.id_serie = ".$id."
        ORDER BY 
            e.numero ASC;";
}

$query = $conexao->query($sql);
$media_data = [];
$media_data['medias'] = [];
$media_data['tipo'] = $tipo;

if ($tipo === 'filme') {
	$media_data = $query->fetch_assoc();
	foreach ($media_data as $key => $value) {
		if (gettype($value) === 'string') {
			if (strpos($value, 'https') === 0) {
				$media_data['medias'][] = [$value, 1, 0];
				unset($media_data[$key]);
			}
		}
	}
} else {
	while ($row = $query->fetch_assoc()) {
		if (empty($media_data['nome'])) {
			$media_data['nome'] = $row['nome'];
			$media_data['sinopse'] = $row['sinopse'];
			$media_data['duracao'] = $row['duracao'];
		}
		if ($media_data['duracao'] < $row['duracao']) {
			$media_data['duracao'] = $row['duracao'];
		}

		$media_data['medias'][] = [$row['link'], $row['numero'], $row['duracao']];
	}
}

$conexao->close();
?>
