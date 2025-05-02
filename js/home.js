let redirect = document.getElementById('home_redirect');
fetch('../control/getBaseUrl.php', {
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
		redirect.addEventListener('click', function() {window.location.href = data.base_url + 'page/login.php'});
	})
	.catch(erro => {
		console.error("Erro: ", erro);
		alert("Houve um problema.");
	});
