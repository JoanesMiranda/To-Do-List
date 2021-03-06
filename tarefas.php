﻿
<?php
if (!isset($_SESSION["email"])) {
    echo "<script> document.location = './login.php'; </script>";
    exit();
}
//formata a data e hora para o formato de nome
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');
?>

<div class="container-fluid">
    <div class="row">
        <!-- Inicio dos botões da lista de tarefas-->
        <div class="col-md-12">
            <a class="btn btn-sm btn-secondary" href="./imprimir/relatorio.php" target="blanck" id="btnTarefas"><i class="fa fa-fw fa-print"> </i>Imprimir</a> 
            <button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#exampleModal" id="btnTarefas" >
                <i class="fa fa-fw fa-plus-square"> </i>Nova Tarefa
            </button> 
            <a class="btn btn-sm btn-danger" href="index.php?prioridade=alta"  id="btnTarefas"><i class="fa fa-fw fa-tags"></i>Prioridade Alta</a>
            <a class="btn btn-sm btn-warning" href="index.php?prioridade=media" id="btnTarefas"><i class="fa fa-fw fa-tags"></i>Prioridade Media</a>
            <a class="btn btn-sm btn-info" href="index.php?prioridade=baixa" id="btnTarefas"><i class="fa fa-fw fa-tags"></i>Prioridade Baixa</a>
        </div>
        <!-- Fim dos botões da lista de tarefas-->
    </div>

    <!-- Inicio Formulario Modal Nova Tarefa-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header badge-info">
                    <h5 class="modal-title " id="exampleModalLabel">Nova Tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="./app/controllers/TarefasController.php" name="formNovaTarefa" id="formNovaTarefa">
                    <input type="hidden" name="action" value="salvar" >
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="titulo">Titulo *</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo da Tarefa" maxlength="90">
                                <span class='msg-caracteres' id="msg-caracteres">limite 90 caracteres..</span>
                                <span class='msg-erro msg-titulo'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data">Data *</label>
                                <input type="date" class="form-control" name="data" id="data">
                                <span class='msg-erro msg-data'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descrição">Descrição *</label>
                                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva a sua Tarefa..." maxlength="180"></textarea>
                                <span class='msg-caracteres' id="msg-caracteres">limite 180 caracteres..</span>
                                <span class='msg-erro msg-descricao'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="prioridade">Nivel de Prioridade *</label>
                                <select name="prioridade" id="prioridade">
                                    <option disabled="true" value="" selected>Selecione...</option>
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baixa"> Baixa</option>
                                </select>
                                <span class='msg-erro msg-prioridade'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="statusTarefa">Andamento da Tarefa *</label>
                                <select name="statusTarefa" id="statusTarefa">
                                    <option disabled="true" value="" selected>Selecione...</option>
                                    <option value="concluida">Concluida</option>
                                    <option value="não concluida">não concluida</option>
                                </select>
                                <span class='msg-erro msg-status'></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-info">Cadastrar Tarefa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fim Formulario Modal Nova Tarefa-->

    <!-- inicio da lista de tarefas -->
    <div class="row">
        <?php include './cardsTarefas.php'; ?>
    </div>
    <!-- Fim da lista de tarefas -->
</div>
