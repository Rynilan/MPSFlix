function createPoster(midiaNome, baseUrl, visto, tipo, id) {
	const div = document.getElementById('main-flex');
	let imgName = midiaNome.replace(/ /g, "_").toLowerCase();
	let viewed = (visto) ? 'visibility': 'visibility_off';
	div.innerHTML = div.innerHTML + `
		<div class='card'>
			<a href='${baseUrl}reprodutor.php/${id}@${tipo}' onclick='redirect(event, "${id}", "${tipo}", "${baseUrl}")'>
				<img src='../img/posters/${imgName}.jpg'/ title='${midiaNome}'>
				<p title='${midiaNome}'>${midiaNome}</p>
				<i class='material-symbols-outlined ${viewed}' title='${(visto)?'Assistido':'Não assistido'}'>${viewed}</i>
			</a>
		</div>
`;
}

fetch('../control/getMidia.php', {
	method: 'POST',
	headers: {
		'Content-Type': 'application/x-www-form-urlencoded'
	},
	body: ``
})

.then(response => {
	if (!response.ok) {
		alert('Algum erro interno aconteceu.');
		return;
	}
	return response.json();
})

.then(data => {
	if (!data.sucesso) {
		alert(data.mensagem);
	} else {
		data.midia.forEach(midia => {
			createPoster(
					midia.nome,
					data.base_url,
					false,
					midia.tipo,
					midia.id
				);
		});
	}
})

.catch(erro => {
	console.error("Erro: ", erro);
	alert("Houve um problema.");
});
