fetch('../control/retrieveData.php', {
	method: 'POST',
	headers: {
		'Content-Type': 'application/x-www-form-urlencoded'
	},
	body: ``
})
.then(response => response.json())
.then(data => {
	let titulo = document.getElementById('titulo');
	titulo.innerHTML = 'Saudações ' + data.nome;
})
.catch(error => {
	console.error('HOW! ', error);
})
