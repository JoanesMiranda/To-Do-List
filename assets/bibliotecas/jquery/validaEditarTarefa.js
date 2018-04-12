var form = document.getElementById("formEditarTarefa");

if (form.addEventListener) {
    form.addEventListener("submit", validaEditarTarefa);
} else if (form.attachEvent) {
    form.attachEvent("onsubmit", validaEditarTarefa);
}

function  validaEditarTarefa(evt) {
    var titulo = document.getElementById('editTitulo');
    var data = document.getElementById('editData');
    var descricao = document.getElementById('editDescricao');
    var prioridade = document.getElementById('editPrioridade');
    var status = document.getElementById('editStatus');
    var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var contErro = 0;


    /* Validação do campo titulo */
    caixa_titulo = document.querySelector('.msg-editTitulo');
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
    caixa_data = document.querySelector('.msg-editData');
    if (data.value == "") {
        caixa_data.innerHTML = "Favor preencher a Data";
        caixa_data.style.display = 'block';
        contErro += 1;
    } else {
        caixa_data.style.display = 'none';
    }

    /* Validação do campo descricao */
    caixa_descricao = document.querySelector('.msg-editDescricao');
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
    caixa_prioridade = document.querySelector('.msg-editPrioridade');
    if (prioridade.value.toString() == "") {
        caixa_prioridade.innerHTML = "Favor escolher a Prioridade";
        caixa_prioridade.style.display = 'block';
        contErro += 1;
    } else {
        caixa_prioridade.style.display = 'none';
    }

    /* Validação do campo status da tarefa */
    caixa_status = document.querySelector('.msg-editStatus');
    if (status.value.toString() == "") {
        caixa_status.innerHTML = "Favor informe o andamento da tarefa";
        caixa_status.style.display = 'block';
        contErro += 1;
    } else {
        caixa_status.style.display = 'none';
    }


    if (contErro > 0) {
        evt.preventDefault();
    }
}