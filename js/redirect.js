function redirect(evento, id, tipo, baseUrl) {
	evento.preventDefault();
	window.location.href =  baseUrl + `page/reprodutor.php?id=${id}&tipo=${tipo}`;
}
