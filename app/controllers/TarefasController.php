<?php

include '../models/Tarefas.php';
include '../models/TarefasDAO.php';
include '../models/Conexao.php';

$tarefasDAO = new TarefasDAO();
$tarefaController = new TarefasController();

session_start();
$email = $_SESSION['email'];

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $action = filter_input(INPUT_POST, 'action');

    $titulo = filter_input(INPUT_POST, 'titulo');
    $data = filter_input(INPUT_POST, 'data');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $prioridade = filter_input(INPUT_POST, 'prioridade');
    $status = filter_input(INPUT_POST, 'statusTarefa');
    $fk = $tarefasDAO->retornaIdUsuario($email);
    $tarefa = new Tarefas($titulo, $data, $descricao, $prioridade, $status, $fk);

    if ($action == "salvar") {
        $tarefaController->inserir($tarefa, $tarefasDAO);
    }
} else if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    $action = filter_input(INPUT_GET, 'action');

    $idTarefa = filter_input(INPUT_GET, 'idTarefa');

    if ($action == "excluir") {
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

}
