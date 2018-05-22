<?php

require '../../bootstrap.php';

use App\Models\Tarefas;
use App\Models\TarefasDAO;

$tarefasDAO = new TarefasDAO();
$tarefaController = new TarefasController();

session_start();
$email = $_SESSION['email'];

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $action = filter_input(INPUT_POST, 'action');

    if ($action == "salvar") {

        $titulo = filter_input(INPUT_POST, 'titulo');
        $data = filter_input(INPUT_POST, 'data');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $prioridade = filter_input(INPUT_POST, 'prioridade');
        $status = filter_input(INPUT_POST, 'statusTarefa');
        $fk = $tarefasDAO->retornaIdUsuario($email);
        $tarefa = new Tarefas(0, $titulo, $data, $descricao, $prioridade, $status, $fk);

        $tarefaController->inserir($tarefa, $tarefasDAO);
    } elseif ($action == "atualizar") {

        $editTitulo = filter_input(INPUT_POST, 'editTitulo');
        $editTData = filter_input(INPUT_POST, 'editData');
        $editDescricao = filter_input(INPUT_POST, 'editDescricao');
        $editPrioridade = filter_input(INPUT_POST, 'editPrioridade');
        $editStatus = filter_input(INPUT_POST, 'editStatus');
        $idEditTArefa = filter_input(INPUT_POST, 'idTarefa');
        $tarefa = new Tarefas($idEditTArefa, $editTitulo, $editTData, $editDescricao, $editPrioridade, $editStatus, 0);

        $tarefaController->atualizar($tarefa, $tarefasDAO);
    }
} else if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    $action = filter_input(INPUT_GET, 'action');

    if ($action == "excluir") {
        $idTarefa = filter_input(INPUT_GET, 'idTarefa');
        $tarefaController->excluir($idTarefa, $tarefasDAO);
    }
}

class TarefasController {

    public function inserir($tarefa, $tarefasDAO) {

        if ($tarefasDAO->cadastrarTarefa($tarefa)) {
            echo header('Location: ../views/index.php');
        } else {
            echo "<script> alert('Erro ao Salvar'); </script>";
        }
    }

    public function excluir($idTarefa, $tarefasDAO) {

        if ($tarefasDAO->excluirTarefa($idTarefa)) {
            echo header('Location: ../views/index.php');
        } else {
            echo "<script> alert('Erro ao excluir a tarefa'); </script>";
        }
    }

    public function atualizar($tarefa, $tarefasDAO) {

        if ($tarefasDAO->atualizarTarefa($tarefa)) {
            echo header('Location: ../views/index.php');
        } else {
            echo "<script> alert('Erro ao Salvar'); </script>";
        }
    }

}
