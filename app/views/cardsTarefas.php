
<?php
include '../models/TarefasDAO.php';
include '../models/Conexao.php';


$email = $_SESSION['email'];
$prioridade = filter_input(INPUT_GET, 'prioridade');
$tarefasDAO = new TarefasDAO();
$values = $tarefasDAO->listarAtividades($email, $prioridade);
$sd = new ArrayIterator($values);
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
                        <a class="dropdown-item badge-light" href="" data-toggle="modal" data-target="#editarTarefaModal">Editar</a>
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
    <?php
    $sd->next();
}
?>

