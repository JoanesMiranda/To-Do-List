<?php

    include '../models/Conexao.php';
    include '../models/Usuario.php';
    include '../models/UsuarioDAO.php';
    include '../models/Login.php';
    include '../models/LoginDAO.php';

    $usuario = new Usuario();
    $usuarioDao = new UsuarioDAO();
    $login = new Login();
    $loginDAO = new LoginDAO();

    $usuario->setNome($_POST['nome']);
    $usuario->setTelefone($_POST['telefone']);
    $usuario->setEndereco($_POST['endereco']);
    $usuario->setNumero($_POST['numero']);


    if ($usuarioDao->salvarUsuario($usuario)) {

        $login->setEmail($_POST['email']);
        $login->setSenha($_POST['senha']);
        $login->setFk_usuario($loginDAO->retornaIdUsuario($_POST['nome']));

        if ($loginDAO->salvarLogin($login)) {
            echo "<script> alert('Salvo com sucesso'); </script>";
            
            header("Location: ../views/registro.php");
        }
    }
