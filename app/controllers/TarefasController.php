    <?php

    include '../models/Tarefas.php';
    include '../models/TarefasDAO.php';
    include '../models/Conexao.php';

    $tarefa = new Tarefas();
    $tarefasDAO = new TarefasDAO();
    
    session_start();
    $email = $_SESSION['email'];

    if ($tarefasDAO->retornaIdUsuario($email)) {
        $fk = $tarefasDAO->retornaIdUsuario($email);
        $tarefa->setTitulo($_POST['titulo']);
        $tarefa->setData($_POST['data']);
        $tarefa->setDescricao($_POST['descricao']);
        $tarefa->setPrioridade($_POST['prioridade']);
        $tarefa->setStatus_tarefa($_POST['statusTarefa']);
        $tarefa->setFk_usuario($fk);

        if ($tarefasDAO->cadastrarTarefa($tarefa)) {
            echo "<script> alert('Salvo com sucesso'); </script>";
            echo "<script> document.location ='../views/index.php'; </script>";
        } else {
            echo "<script> alert('Erro ao Salvar'); </script>";
        }
    } else {
        echo "<script> alert('erro ao retorna ID do usuario'); </script>";
    }


    class TarefasController {

    }
