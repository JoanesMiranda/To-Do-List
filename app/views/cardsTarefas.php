
<?php

$email = $_SESSION['email'];
$prioridade = filter_input(INPUT_GET, 'prioridade');
$tarefasDAO = new TarefasDAO();
$tarefas = $tarefasDAO->listarAtividades($email, $prioridade);

$pesquisar = filter_input(INPUT_POST, 'pesquisar');
$action = filter_input(INPUT_POST, 'action');
$tarefasLike = $tarefasDAO->listarTarefasByLike($email, $pesquisar);

if ($action == 'pesquisar') {
    $sd = new ArrayIterator($tarefasLike);
} else {
    $sd = new ArrayIterator($tarefas);
}
?>

<?php while ($sd->valid()) { ?>

    <div class="col-md-4  mt-4 mb-2">
        <h6><?php echo implode("/", array_reverse(explode("-", $sd->current()->data))); ?></h6>
        <div class="card card-login" id="cardsTarefas">  
            <div class="card-header text-right">
                <div class="dropdown" >
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-tags badge badge-pill <?php echo $tarefasDAO->retornaPrioridade($sd->current()->prioridade); ?>"> </i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item badge-light" href="" data-target="#<?php echo $sd->current()->idtarefas;?>" data-toggle="modal">Editar</a>
                        <a class="dropdown-item badge-light" href="../controllers/TarefasController.php?idTarefa=<?php echo $sd->current()->idtarefas; ?>&action=excluir ">Excluir</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title text-justify"><?php echo $sd->current()->titulo; ?></h5>
                <p class="card-text text-justify"><?php echo $sd->current()->descricao; ?></p>    
            </div> 
        </div>
    </div>

    <!-- Inicio editar modal tarefas  -->
    <div class="modal fade" id="<?php echo $sd->current()->idtarefas; ?>" tabindex="-1" role="dialog" aria-labelledby="editarTareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header badge-info">
                    <h5 class="modal-title " id="editarTareModalLabel" >Editar Tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="../controllers/TarefasController.php"  id="formEditarTarefa" name="formEditarTarefa">
                    <input type="hidden" name="action" value="atualizar">
                    <input type="hidden" name="idTarefa" value="<?php echo $sd->current()->idtarefas; ?>">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" name="editTitulo" value="<?php echo $sd->current()->titulo; ?>" 
                                       id="editTitulo" placeholder="Titulo da Tarefa" required="" maxlength="45">
                                <span class='msg-erro msg-editTitulo'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data">Data</label>
                                <input type="text" class="form-control" name="editData" value="<?php echo implode("/", array_reverse(explode("-", $sd->current()->data))); ?>" id="editData" required="">
                                <span class='msg-erro msg-editData'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descrição">Descrição</label>
                                <textarea class="form-control" name="editDescricao"
                                          id="editDescricao" rows="3" placeholder="Descreva a sua Tarefa..." required="" 
                                          maxlength="145"><?php echo $sd->current()->descricao; ?></textarea>
                                <span class='msg-erro msg-editDescricao'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editPrioridade">Nivel de Prioridade</label>
                                <select name="editPrioridade" id="editPrioridade">
                                    <option disabled="true" value="" selected>Selecione...</option>

                                    <option value="alta" <?php
                                    if (isset($sd->current()->prioridade) &&
                                            $sd->current()->prioridade == "alta") {
                                        echo "selected";
                                    }
                                    ?>>Alta</option>
                                    <option value="media" <?php
                                    if (isset($sd->current()->prioridade) &&
                                            $sd->current()->prioridade == "media") {
                                        echo "selected";
                                    }
                                    ?>>Media</option>
                                    <option value="baixa" <?php
                                    if (isset($sd->current()->prioridade) &&
                                            $sd->current()->prioridade == "baixa") {
                                        echo "selected";
                                    }
                                    ?>> Baixa</option>
                                </select>
                                <span class='msg-erro msg-editPrioridade'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editStatus">Andamento da Tarefa</label>
                                <select name="editStatus" id="editStatus">
                                    <option disabled="true" value="" selected>Selecione...</option>
                                    <option value="concluida" <?php
                                    if (isset($sd->current()->status_tarefa) &&
                                            $sd->current()->status_tarefa == "concluida") {
                                        echo "selected";
                                    }
                                    ?>>Concluida</option>
                                    <option value="não concluida" <?php
                                    if (isset($sd->current()->status_tarefa) &&
                                            $sd->current()->status_tarefa == "não concluida") {
                                        echo "selected";
                                    }
                                    ?>>não concluida</option>
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
    <!-- Fim editar modal tarefas  -->
    <script src="../../assets/bibliotecas/jquery/validaEditarTarefa.js"></script>
    <?php
    $sd->next();
}
?>

