<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../css/sb-admin.min.css" >
        <title>Lista de Tarefas</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-sm btn-info" href="#"><i class="fa fa-fw fa-book"> </i>Lista de Tarefas</a>
                    <a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-fw fa-print"> </i>Imprimir</a> 
                    <button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-plus-square"> </i>Nova Tarefa
                    </button> 
                </div>
            </div>

            <!-- Inicio Formulario Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Nova Tarefa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="login.php">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Titulo</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo da Tarefa">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" name="data" id="data">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="descrição">Descrição</label>
                                        <textarea class="form-control" name="descricao" id="descricao" placeholder="Descreva a sua Tarefa..."></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="prioridade">Nivel de Prioridade</label>
                                        <select name="prioridade" id="prioridade">
                                            <option disabled="true" selected="true">Selecione...</option>
                                            <option value="alta">Alta</option>
                                            <option value="media">Media</option>
                                            <option value="baixa"> Baixa</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="prioridade">Andamento da Tarefa</label>
                                        <select name="prioridade" id="prioridade">
                                            <option disabled="true" selected="true">Selecione...</option>
                                            <option value="concluida">Concluida</option>
                                            <option value="não concluida">não concluida</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar Tarefa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fim Formulario Modal -->

            <!-- Inicio da lista de tarefas -->
            <div class="row">
                <div class="col-md-4  mt-4">
                    <h6>Segunda Feira, 03 de Abril de 2018</h6>
                    <div class="card card-login">    
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This card has supporting text below </p>      
                        </div> 
                        <div class="card-footer form-row">
                            <div class="col-sm-6">
                                 <button type="button" class="btn btn-warning form-control">Editar</button>
                            </div>
                            <div class="col-sm-6">
                                 <button type="button" class="btn btn-danger form-control">Excluir</button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim da lista de tarefas -->
        </div>
        <script src="../../bibliotecas/jquery/jquery.min.js" ></script>
        <script src="../../bibliotecas/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <script src="../../bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
    </body>
</html>