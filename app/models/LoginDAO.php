<?php

class LoginDAO {

    public function retornaIdUsuario($nome) {
        try {
            $db = Conexao::conecta();
            $sql = "SELECT idusuario FROM usuario WHERE nome = ?";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $nome);
            if ($rs->execute()) {
                if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    return $registro->idusuario;
                }
            }
        } catch (PDOException $ex) {
            echo "Erro ao retornar dados do usuario" . $ex->getMessage();
        }
    }

    public function login($email, $senha) {
        $db = Conexao::conecta();
        $sql = "SELECT email,senha FROM usuario WHERE email = ? AND senha = ?";
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

    public function recuperarSenha($senha, $email) {
        try {
            $db = Conexao::conecta();
            $sql = "UPDATE usuario SET senha = ? WHERE email = ?";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(1, $senha);
            $stmt->bindParam(2, $email);

            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "<script> alert('Erro ao atualizar senha do usuario'); </script> " . $ex->getMessage();
        }
    }

    public function validaEmail($email) {
        try {
            $db = Conexao::conecta();
            $sql = "SELECT email FROM usuario WHERE email = ?";

            $rs = $db->prepare($sql);
            $rs->bindParam(1, $email);

            if ($rs->execute()) {
                return $registro = $rs->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $ex) {
            //echo "<script> alert('Email não cadastrado no sistema'); </script> ";
        }
    }

}
