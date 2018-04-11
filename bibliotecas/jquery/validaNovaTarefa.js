var form = document.getElementById("formNovaTarefa");

if (form.addEventListener) {
    form.addEventListener("submit", validaNovaTarefa);
} else if (form.attachEvent) {
    form.attachEvent("onsubmit", validaNovaTarefa);
}

function  validaNovaTarefa(evt) {
    var titulo = document.getElementById('titulo');
    var data = document.getElementById('data');
    var descricao = document.getElementById('descricao');
    var prioridade = document.getElementById('prioridade');
    var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var contErro = 0;


    /* Validação do campo titulo */
    caixa_titulo = document.querySelector('.msg-titulo');
    if (titulo.value == "") {
        caixa_titulo.innerHTML = "Favor preencher o Titulo";
        caixa_titulo.style.display = 'block';
        contErro += 1;
    } else if (titulo.value.length > 90) {
        caixa_titulo.innerHTML = "Digite no maximo 90 caracteres";
        caixa_titulo.style.display = 'block';
        contErro += 1;
    } else {
        caixa_titulo.style.display = 'none';
    }

    /* Validação do campo data */
    caixa_data = document.querySelector('.msg-data');
    if (data.value == "") {
        caixa_data.innerHTML = "Favor preencher a Data";
        caixa_data.style.display = 'block';
        contErro += 1;
    } else {
        caixa_data.style.display = 'none';
    }

    /* Validação do campo descricao */
    caixa_descricao = document.querySelector('.msg-descricao');
    if (descricao.value == "") {
        caixa_descricao.innerHTML = "Favor preencher a Descriçao";
        caixa_descricao.style.display = 'block';
        contErro += 1;
    } else if (descricao.value.length > 180) {
        caixa_descricao.innerHTML = "Digite no maximo 180 caracteres";
        caixa_descricao.style.display = 'block';
        contErro += 1;
    } else {
        caixa_descricao.style.display = 'none';
    }

    /* Validação do campo prioridade */
    caixa_prioridade = document.querySelector('.msg-prioridade');
    if (prioridade.value === null) {
        caixa_prioridade.innerHTML = "Favor preencher a Prioridade";
        caixa_prioridade.style.display = 'block';
        contErro += 1;
    } else {
        caixa_prioridade.style.display = 'none';
    }

    if (contErro > 0) {
        evt.preventDefault();
    }
}