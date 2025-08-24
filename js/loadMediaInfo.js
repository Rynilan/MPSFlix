function createEntry(link, id, serie, titulo) {
    let linha = document.createElement('tr');
    linha.innerHTML = `
        <td>${id}</td>
        <td class='nome'>${(serie) ? 'Episódio ' + id + ' de ' + titulo: 'Filme ' + titulo}</td>
    `;
    linha.onclick = () => {
        window.open(link, '_blank');
    };
    document.getElementById('corpo').appendChild(linha);
}

let arg = '?' + window.location.href.split('?').pop();
fetch('../control/getMidiaInfo.php' + arg, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
})

.then(response => {
    if (!response.ok) {
        alert('Algum erro interno aconteceu.');
        return;
    }
    return response.json();
})

	.then(data => {
		document.getElementById('title').innerHTML = data.nome;
		document.getElementById('midia_descricao').innerHTML = document.getElementById('midia_descricao').innerHTML + data.sinopse;
		document.getElementById('midia_duracao').innerHTML = '<b>' + ((data.duracao.includes(':')) ? 'Duração: ' + data.duracao : data.duracao + ' temporada(s)') + '</b>';
		document.getElementById('midia_image').src = window.location.href.split('/page')[0] + '/img/posters/' + data.nome.toLowerCase().replace(/ /g, '_') + '.jpg'; // '.split(".com")' para url e '.split("/page")'
		let temporadaPosta = 0;
		if (data.medias[0][2] != 0) {
			data.medias.sort((m1, m2) => m1[2] - m2[2]);
		}
		data.medias.forEach((media) => {
			if (media[2] > temporadaPosta) {
				let linha = document.createElement('tr');
				linha.innerHTML = `<td colspan='2' class='divisao'>${media[2]} Temporada</td>`;
				document.getElementById('corpo').appendChild(linha);
				temporadaPosta = media[2];
			}
			createEntry(media[0], media[1], data.tipo === 'serie', data.nome);
		});
	})

.catch(erro => {
    console.error("Erro: ", erro);
    alert("Houve um problema.");
});
