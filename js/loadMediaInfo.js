function createEntry(link, id, serie, titulo) {
    let linha = document.createElement('tr');
    linha.innerHTML = `
        <td>${id}</td>
        <td class='nome'>${(serie) ? titulo + ' episódio' + id: 'Filme ' + titulo}</td>
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
    document.getElementById('midia_titulo').innerHTML = data.nome;
    document.getElementById('midia_descricao').innerHTML = document.getElementById('midia_descricao').innerHTML + data.sinopse;
    document.getElementById('midia_duracao').innerHTML = '<b>' + ((data.duracao.includes(':')) ?'Duração: ' + data.duracao : data.duracao + ' temporada(s)') + '</b>';
    document.getElementById('midia_image').src = window.location.href.split('.com')[0] + '.com/img/posters/' + data.nome.toLowerCase().replace(/ /g, '_') + '.jpg';
    var index = 0;
    data.links.forEach((link) => {
        index += 1;
        createEntry(link, index, data.tipo === 'serie', data.nome);
    });
})

.catch(erro => {
    console.error("Erro: ", erro);
    alert("Houve um problema.");
});