document.addEventListener('DOMContentLoaded', function() {
	let inputSenha = document.getElementById('senha');
	let inputEmail = document.getElementById('email');
	let botaoEntrar = document.getElementById('enviar');
	let form = document.getElementById('form');

	form.addEventListener('submit', function() {
		botaoEntrar.disabled = true;
		botaoEntrar.innerHTML = 'Comparando...';
		botaoEntrar.style.backgroundColor = '#300';
		event.preventDefault();
		let email = inputEmail.value;
		let senha = inputSenha.value;

		fetch('../control/verify.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
			body: `email=${encodeURIComponent(email)}&senha=${encodeURIComponent(senha)}`
		})
		.then(response => {
			if (!response.ok) {
				alert('Algum erro interno aconteceu.');
				return;
			}
			return response.json();
		})
		.then(data => {
			if (data.sucesso) {
				alert("Bem vindo(a) " + data.nome); 
				window.location.href = data.url;
			} else {
				alert(data.mensagem);
			}
			botaoEntrar.disabled = false;
			botaoEntrar.style.backgroundColor = 'crimson';
			botaoEntrar.innerText = 'Entrar';
		})
		.catch(erro => {
			console.error("Erro: ", erro);
			alert("Houve um problema.");
			botaoEntrar.disabled = false;
			botaoEntrar.style.backgroundColor = 'crimson';
			botaoEntrar.innerText = 'Entrar';
		});
	});
});
