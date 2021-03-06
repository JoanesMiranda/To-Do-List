<?php
require './bootstrap.php';

use App\Models\TarefasDAO;

$email = $_SESSION['email'];

$tarefasDAO = new TarefasDAO();

$prioridade = filter_input(INPUT_GET, 'prioridade');
$pesquisar = filter_input(INPUT_POST, 'pesquisar');
$action = filter_input(INPUT_POST, 'action');
$concluida = filter_input(INPUT_GET, 'tarefas');


if ($action == 'pesquisar') {
    $tarefasLike = $tarefasDAO->listarTarefasByLike($email, $pesquisar);
    $sd = new ArrayIterator($tarefasLike);
} else if ($concluida == 'f') {
    $tarefaConcluida = $tarefasDAO->listarTarefasFinalizadas($email);
    $sd = new ArrayIterator($tarefaConcluida);
} else {
    $tarefas = $tarefasDAO->listarAtividades($email, $prioridade);
    $sd = new ArrayIterator($tarefas);
}


//formata a data e hora para o formato de nome
setlocale(LC_ALL, "pt_BR", "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

?>

<?php while ($sd->valid()) { ?>
    <!-- Inicio do cards tarefa -->
    <div class="col-md-4  mt-4 mb-2">
        <h6><?php echo ucfirst(utf8_encode(strftime("%A, %d de %B de %Y", strtotime($sd->current()->data)))); ?></h6>
        <div class="card card-login" id="cardsTarefas">  
            <div class="card-header">
                <div class="row">
                    <div class="col-6 ">
                        <input type="checkbox" name="itemImprimir" class="text-lefth"> 
                    </div>
                    <div class="col-6 ">
                        <div class="dropdown pull-right">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-tags badge badge-pill <?php echo $tarefasDAO->retornaPrioridade($sd->current()->prioridade); ?>"> </i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item badge-light" href="" data-target="#<?php echo $sd->current()->idtarefas; ?>" data-toggle="modal">Editar</a>
                                <a class="dropdown-item badge-light" href="app/controllers/TarefasController.php?idTarefa=<?php echo $sd->current()->idtarefas; ?>&action=excluir"  onclick ="return confirm('Deseja excluir a tarefa ?');">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title text-justify"><?php echo $sd->current()->titulo; ?></h5>
                <p class="card-text text-justify"><?php echo $sd->current()->descricao; ?></p>    
            </div> 
        </div>
    </div>
    <!-- Fim do cards tarefa -->

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
                <form method="POST" action="app/controllers/TarefasController.php"  id="formEditarTarefa" name="formEditarTarefa">
                    <input type="hidden" name="action" value="atualizar">
                    <input type="hidden" name="idTarefa" value="<?php echo $sd->current()->idtarefas; ?>">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="titulo">Titulo *</label>
                                <input type="text" class="form-control" name="editTitulo" value="<?php echo $sd->current()->titulo; ?>" 
                                       id="editTitulo" placeholder="Titulo da Tarefa" required="" maxlength="45">
                                <span class='msg-erro msg-editTitulo'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data">Data *</label>
                                <input type="text" class="form-control" name="editData" value="<?php echo implode("/", array_reverse(explode("-", $sd->current()->data))); ?>" id="editData" required="">
                                <span class='msg-erro msg-editData'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descrição">Descrição *</label>
                                <textarea class="form-control" name="editDescricao"
                                          id="editDescricao" rows="3" placeholder="Descreva a sua Tarefa..." required="" 
                                          maxlength="145"><?php echo $sd->current()->descricao; ?></textarea>
                                <span class='msg-erro msg-editDescricao'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editPrioridade">Nivel de Prioridade *</label>
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
                                <label for="editStatus">Andamento da Tarefa *</label>
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
    <?php
    $sd->next();
}
?>

