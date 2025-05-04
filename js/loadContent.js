document.addEventListener("DOMContentLoaded", () => {
    const ROOT_PATH = window.location.origin + "/MPSFlix/";
	const PAGE_NAME = window.location.pathname.split('/').pop().slice(0, -4);

    document.querySelectorAll("a").forEach(link => {
        if (link.getAttribute("href") && !link.getAttribute("href").startsWith("http")) {
            link.href = ROOT_PATH + link.getAttribute("href");
        }
    });

	fetch('../control/pageAssets.php?page=' + PAGE_NAME)
		.then(resposta => {
			if (!resposta.ok) {
				throw new Error('Erro na resposta http.');
			}
			return resposta.json()
		})
		.then(data => {
			loadContent(data.html, '#main');
			loadStyles(data.css);
			loadScripts(data.js);
		})
		.catch(erro => {
			window.location.href = ROOT_PATH + 'page/error.php?code_error=500';
		})
});

function loadContent(url, target) {
    fetch(url)
        .then(response => {
            if (!response.ok) throw new Error("Error loading content");
            return response.text();
        })
        .then(data => document.querySelector(target).innerHTML = data)
}

function loadStyles(styles) {
    styles.forEach(style => {
        let link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = ROOT_PATH + 'css/' + style + '.css';
        document.head.appendChild(link);
    });
}

function loadScripts(scripts) {
    scripts.forEach(script => {
        let scriptTag = document.createElement("script");
        scriptTag.src = ROOT_PATH + 'js/' + script + '.js';
        document.body.appendChild(scriptTag);
    });
}
