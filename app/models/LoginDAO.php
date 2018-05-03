<?php

class LoginDAO {

   public function retornaIdUsuario($nome) {
        try {
            $db = Conexao::conecta();
            $sql = "SELECT idpessoa FROM pessoa WHERE nome = ?";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $nome);
            if ($rs->execute()) {
                if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    return $registro->idpessoa;
                }
            }
        } catch (PDOException $ex) {
            echo "Erro ao retornar dados do usuario" . $ex->getMessage();
        }
    }
    
    
    public function salvarLogin(Login $login) {

        try {
            $db = Conexao::conecta();
            $sql = "INSERT INTO login (email, senha, fk_pessoa)"
                    . " VALUES (?,?,?)";

            $stmt = $db->prepare($sql);

            $email = $login->getEmail();
            $stmt->bindParam(1, $email);

            $senha = md5($login->getSenha() . $email);
            $stmt->bindParam(2, $senha);

            $fk_pessoa = $login->getFk_pessoa();
            $stmt->bindParam(3, $fk_pessoa);

            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "Error ao salvar o login" . $ex->getMessage();
        }
    }

    public function login($email, $senha) {
        $db = Conexao::conecta();
        $sql = "SELECT email,senha FROM login WHERE email = ? AND senha = ?";
        $rs = $db->prepare($sql);
        $rs->bindParam(1, $email);
        $hashSenha = md5($senha);
        $rs->bindParam(2, $hashSenha);

        if ($rs->execute()) {
            if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                session_start();
                $_SESSION["email"] = $registro->email;
                header("Location: ../views/index.php");
            } else {
                echo "<script> alert('Usuario ou Senha incorretos'); </script>";
                echo "<script> document.location='../views/login.php'; </script>";
                exit();
            }
        } else {
            echo "<script> alert('Usuario ou Senha incorretos'); </script>";
            echo "<script> document.location='../views/login.php'; </script>";
            exit();
        }
    }

}
