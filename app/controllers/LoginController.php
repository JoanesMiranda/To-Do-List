<?php
    include '../models/LoginDAO.php';
    include '../models/Conexao.php';

    $loginDAO = new LoginDAO();
    
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    $loginDAO->login($email, $senha.$email);
        
class LoginController {
    
}
