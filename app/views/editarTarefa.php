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
        <!-- Inicio Formulario Modal -->
        <div class="modal fade" id="editarTarefaModal" tabindex="-1" role="dialog" aria-labelledby="editarTareModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header badge-info">
                        <h5 class="modal-title " id="editarTareModalLabel">Editar Tarefa</h5>
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
                                    <textarea class="form-control" name="descricao" id="descricao" rows="4" placeholder="Descreva a sua Tarefa..."></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prioridade">Nivel de Prioridade</label>
                                    <select name="prioridade" id="prioridade">
                                        <option disabled="true" selected>Selecione...</option>
                                        <option value="alta">Alta</option>
                                        <option value="media">Media</option>
                                        <option value="baixa"> Baixa</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prioridade">Andamento da Tarefa</label>
                                    <select name="prioridade" id="prioridade">
                                        <option disabled="true" selected>Selecione...</option>
                                        <option value="concluida">Concluida</option>
                                        <option value="não concluida">não concluida</option>
                                    </select>
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
        <!-- Fim Formulario Modal -->
        <script src="../../bibliotecas/jquery/jquery.min.js" ></script>
        <script src="../../bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
    </body>
</html>