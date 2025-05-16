let redirect = document.getElementById('home_redirect');
fetch('../control/getHomeUrl.php', {
	method: 'POST',
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
		redirect.addEventListener('click', function() {window.location.href = data.url});
	})
	.catch(erro => {
		console.error("Erro: ", erro);
		alert("Houve um problema.");
	});
