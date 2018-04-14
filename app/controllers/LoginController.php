<?php
    include '../models/LoginDAO.php';
    include '../models/Conexao.php';

    $loginDAO = new LoginDAO();
    
    $loginDAO->login($_POST['email'], $_POST['senha'].$_POST['email']);
        
class LoginController {
    
}
