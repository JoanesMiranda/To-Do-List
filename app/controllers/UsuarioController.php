<?php

use App\Models\Usuario;

$nome =$_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$numero =$_POST['numero'];

$usuarioController = new UsuarioController(new Fachada());
$usuarioController->inserir(new Usuario($nome, $telefone, $endereco, $numero));

class UsuarioController {

   

}
