var campoCEP = document.querySelector('#cep');

var campos = ['logradouro', 'bairro', 'localidade', 'uf'];

function atualizarEnderecoPeloCEP() {
    let cep = campoCEP.value;
    let requestURL = 'https://viacep.com.br/ws/' + cep + '/json/'; // Corrigido o erro na URL
    let request = new XMLHttpRequest();
    request.open('GET', requestURL);
    request.send();
    request.onload = function () {
        let resposta = request.responseText; // Corrigido o nome da propriedade
        atualizarCamposDoFormulario(resposta);
    }
}

function atualizarCamposDoFormulario(dadosjson) {
    let dados = JSON.parse(dadosjson);
    if (!dados.erro) { // Corrigido a condição
        campos.forEach(item => {
            document.getElementById(item).value = dados[item];
        });
    }
}

campoCEP.addEventListener('change', atualizarEnderecoPeloCEP);
