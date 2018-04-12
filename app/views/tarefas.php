<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/sb-admin.min.css" >
        <title>Lista de Tarefas</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Inicio dos botões da lista de tarefas-->
                <div class="col-md-12">
                    <a class="btn btn-sm btn-secondary" href="#" id="btnTarefas"><i class="fa fa-fw fa-print"> </i>Imprimir</a> 
                    <button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#exampleModal" id="btnTarefas" >
                        <i class="fa fa-fw fa-plus-square"> </i>Nova Tarefa
                    </button> 
                    <a class="btn btn-sm btn-danger" href="#"  id="btnTarefas"><i class="fa fa-fw fa-tags"></i>Prioridade Alta</a>
                    <a class="btn btn-sm btn-warning" href="#" id="btnTarefas"><i class="fa fa-fw fa-tags"></i>Prioridade Media</a>
                    <a class="btn btn-sm btn-info" href="#" id="btnTarefas"><i class="fa fa-fw fa-tags"></i>Prioridade Baixa</a>
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
                        <form method="POST" action="" name="formNovaTarefa" id="formNovaTarefa">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo da Tarefa">
                                        <span class='msg-erro msg-titulo'></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" name="data" id="data">
                                        <span class='msg-erro msg-data'></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="descrição">Descrição</label>
                                        <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva a sua Tarefa..."></textarea>
                                        <span class='msg-erro msg-descricao'></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="prioridade">Nivel de Prioridade</label>
                                        <select name="prioridade" id="prioridade">
                                            <option disabled="true" value="" selected>Selecione...</option>
                                            <option value="alta">Alta</option>
                                            <option value="media">Media</option>
                                            <option value="baixa"> Baixa</option>
                                        </select>
                                        <span class='msg-erro msg-prioridade'></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="statusTarefa">Andamento da Tarefa</label>
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

            <!-- Inicio Formulario Modal EditarTarefa -->
            <div class="modal fade" id="editarTarefaModal" tabindex="-1" role="dialog" aria-labelledby="editarTareModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header badge-info">
                            <h5 class="modal-title " id="editarTareModalLabel" >Editar Tarefa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="" id="formEditarTarefa" name="formEditarTarefa">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" class="form-control" name="editTitulo" id="editTitulo" placeholder="Titulo da Tarefa">
                                        <span class='msg-erro msg-editTitulo'></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" name="editData" id="editData">
                                        <span class='msg-erro msg-editData'></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="descrição">Descrição</label>
                                        <textarea class="form-control" name="editDescricao" id="editDescricao" rows="3" placeholder="Descreva a sua Tarefa..."></textarea>
                                        <span class='msg-erro msg-editDescricao'></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="editPrioridade">Nivel de Prioridade</label>
                                        <select name="editPrioridade" id="editPrioridade">
                                            <option disabled="true" value="" selected>Selecione...</option>
                                            <option value="alta">Alta</option>
                                            <option value="media">Media</option>
                                            <option value="baixa"> Baixa</option>
                                        </select>
                                        <span class='msg-erro msg-editPrioridade'></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="editStatus">Andamento da Tarefa</label>
                                        <select name="editStatus" id="editStatus">
                                            <option disabled="true" value="" selected>Selecione...</option>
                                            <option value="concluida">Concluida</option>
                                            <option value="não concluida">não concluida</option>
                                        </select>
                                        <span class='msg-erro msg-editStatus'></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-info">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fim Formulario Modal Editar Tarefa-->

            <div class="row">
                <!-- inicio da lista de tarefas -->
                <div class="col-md-4  mt-4 mb-2">
                    <h6>Segunda Feira, 03 de Abril de 2018</h6>
                    <div class="card card-login">  
                        <div class="card-header text-right">
                            <div class="dropdown" >
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-tags badge badge-pill badge-danger"> </i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item badge-light" href="" data-toggle="modal" data-target="#editarTarefaModal">Editar</a>
                                    <a class="dropdown-item badge-light" href="">Excluir</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-justify">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de teste a</h5>
                            <p class="card-text text-justify">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
                                e vem sendo utilizado desde o século XVI, quando um </p>    
                        </div> 
                    </div>
                </div>
                <!-- Fim da lista de tarefas -->
            </div>
        </div>
        <script src="../../assets/bibliotecas/jquery/jquery.min.js" ></script>
        <script src="../../assets/bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
    </body>
</html>