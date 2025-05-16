function loadContent(data, target) {
	document.querySelector(target).innerHTML += data
}

function loadStyles(styles) {
    const ROOT_PATH = window.location.origin + "/MPSFlix/";
    styles.forEach(style => {
        let link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = ROOT_PATH + 'css/' + style + '.css';
        document.head.appendChild(link);
    });
}

function loadScripts(scripts) {
    const ROOT_PATH = window.location.origin + "/MPSFlix/";
    scripts.forEach(script => {
        let scriptTag = document.createElement("script");
        scriptTag.src = ROOT_PATH + 'js/' + script + '.js';
        document.body.appendChild(scriptTag);
    });
}


const ROOT_PATH = window.location.origin + "/MPSFlix/";
const PAGE_NAME = window.location.pathname.split('/').pop().slice(0, -4);
const GET_ARGS = new URLSearchParams(window.location.search);
let code_error = GET_ARGS.get("code_error");

document.querySelectorAll("a").forEach(link => {
	if (link.getAttribute("href") && !link.getAttribute("href").startsWith("http")) {
		link.href = ROOT_PATH + link.getAttribute("href");
	}
});
fetch(ROOT_PATH + 'control/pageAssets.php?page=' + PAGE_NAME + ((code_error)? ('&code=' + code_error) :''))
	.then(resposta => {
		if (!resposta.ok) {
			throw new Error(`Erro na resposta http ${resposta.status}.`);
		}
		return resposta.json()
	})
	.then(data => {
		document.getElementById('title').innerText = data.title;
		loadContent(data.html, '#main');
		loadStyles(data.css);
		loadScripts(data.js);
	})
	.catch(erro => {
		console.error(erro.message);
		window.location.href = ROOT_PATH + 'page/error.php?code_error=500';
	});
