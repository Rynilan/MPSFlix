function login() {
	event.preventDefault();

	const inputSenha = document.getElementById('senha');
	const inputEmail = document.getElementById('email');
	const botaoEntrar = document.getElementById('enviar');
	const form = document.getElementById('form');

	botaoEntrar.disabled = true;
	botaoEntrar.style.backgroundColor = '#300';

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
			return;
		}
		return response.json();
	})
	.then(data => {
		if (data.sucesso) {
			window.location.href = data.url;
		} else {
			alert(data.mensagem);
		}
		botaoEntrar.disabled = false;
		botaoEntrar.style.backgroundColor = 'crimson';
	})
	.catch(erro => {
		console.error("Erro: ", erro);
		alert("Houve um problema.");
		botaoEntrar.disabled = false;
		botaoEntrar.style.backgroundColor = 'crimson';
	});
}
