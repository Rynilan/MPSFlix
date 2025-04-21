<?php
include 'conexao.php';

if ($tipo === 'filme') {
    $sql = "select nome, sinopse, duracao, link from tb_".$tipo."s where id_".$tipo." = ".$id.";";
} else {
    $sql = "SELECT 
            s.nome AS nome,
            s.descricao AS sinopse,
            MAX(e.temporada) AS duracao,
            e.link AS link
          FROM 
            tb_series s
          JOIN 
            tb_episodios e ON s.id_serie = e.id_serie
          WHERE 
            s.id_serie = ".$id.";";
}


$query = $conexao->query($sql);
$media_data = $query->fetch_assoc();
$media_data['links'] = [];
$media_data['tipo'] = $tipo;
foreach ($media_data as $key => $value) {
    if (gettype($value) === 'string') {
        if (strpos($value, 'https') === 0) {
            array_push($media_data['links'], $value);
            unset($media_data[$key]);
        }
    }
}

$conexao->close();
?>
