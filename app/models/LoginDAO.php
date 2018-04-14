<?php

class LoginDAO {

    public function salvarLogin(Login $login) {

        try {
            $db = Conexao::conecta();
            $sql = "INSERT INTO login (email, senha, fk_pessoa)"
                    . " VALUES (?,?,?)";

            $stmt = $db->prepare($sql);

            $email = $login->getEmail();
            $stmt->bindParam(1, $email);

            $senha = $login->getSenha();
            $stmt->bindParam(2, $senha);

            $fk_usuario = $login->getFk_usuario();
            $stmt->bindParam(3, $fk_usuario);

            return $stmt->execute();
        } catch (PDOException $ex) {

            echo "<script> alert('Erro'); </script>" . $ex->getMessage();
        }
    }

    public function retornaIdUsuario($nome) {
        try {
            $db = Conexao::conecta();
            $sql = "SELECT idpessoa FROM pessoa WHERE nome = ?";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $nome);
            if ($rs->execute()) {
                $dados = array();
                if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    return $registro->idpessoa;
                }
            }
        } catch (PDOException $ex) {
            echo "Erro ao retornar dados do usuario" . $ex->getMessage();
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
