<?php

require '../../bootstrap.php';

use App\Models\LoginDAO;
use App\Models\Usuario;
use App\Models\UsuarioDAO;

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
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $usuario = new Usuario($nome, $telefone, $endereco, $numero, $email, $senha);

        $usuarioController->inserir($usuarioDAO, $usuario);
    }
}

class UsuarioController {

    public function inserir($usuarioDAO, $usuario) {
        if ($usuarioDAO->salvarUsuario($usuario)) {
            echo "<script> alert('Salvo com sucesso'); </script>";
            echo "<script> document.location= '../views/registro.php'; </script>";
        } else {
            echo "erro ao cadastrar usuario";
        }
    }

}
