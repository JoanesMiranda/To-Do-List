<?php

include '../models/Conexao.php';
include '../models/Usuario.php';
include '../models/UsuarioDAO.php';
include '../models/Login.php';
include '../models/LoginDAO.php';

$usuarioController = new UsuarioController();
$usuarioDAO = new UsuarioDAO();
$loginDAO = new LoginDAO();

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $action = filter_input(INPUT_POST, 'action');

    if ($action == "salvar") {

        $nome = filter_input(INPUT_POST, 'nome');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $numero = filter_input(INPUT_POST, 'numero');
        $usuario = new Usuario($nome, $telefone, $endereco, $numero);

        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $fk = $loginDAO->retornaIdUsuario(filter_input(INPUT_POST, 'nome'));
        $login = new Login($email, $senha, $fk);

        $usuarioController->inserir($usuario, $usuarioDAO, $login, $loginDAO);
    }
}

class UsuarioController {

    public function inserir($usuario, $usuarioDAO, $login, $loginDAO) {

        if ($usuarioDAO->salvarUsuario($usuario)) {
            if ($loginDAO->salvarLogin($login)) {
                echo "<script> alert('Salvo com sucesso'); </script>";
                echo "<script> document.location= '../views/registro.php'; </script>";
            } else {
                echo "<script> alert('erro ao salvar o login'); </script>";
            }
        } else {
            echo "<script> alert('erro ao salvar o usuario'); </script>";
        }
    }

}
