<?php

namespace App\Models;

use PDO;

class UsuarioDAO {

    public function salvarUsuario(Usuario $usuario) {

        try {
            $db = Conexao::conecta();
            $sql = "INSERT INTO usuario (nome,telefone,endereco,numero,email,senha)"
                    . " VALUES (?,?,?,?,?,?)";

            $stmt = $db->prepare($sql);

            $nome = $usuario->getNome();
            $stmt->bindParam(1, $nome);

            $telefone = $usuario->getTelefone();
            $stmt->bindParam(2, $telefone);

            $endereco = $usuario->getEndereco();
            $stmt->bindParam(3, $endereco);

            $numero = $usuario->getNumero();
            $stmt->bindParam(4, $numero);

            $email = $usuario->getEmail();
            $stmt->bindParam(5, $email);

            $senha = md5($usuario->getSenha() . $email);
            $stmt->bindParam(6, $senha);

            return $stmt->execute();
        } catch (\PDOException $ex) {
            $codigo = $ex->getCode();
            if ($codigo == 23000) {
                echo "<script> alert('O email digitado já está cadastrado no sistema'); </script>";
                echo "<script> document.location= '../views/registro.php'; </script>";
            } else {
                echo "Error " . $ex->getMessage();
            }
        }
    }

    public function retornaUsuario($email) {
        try {
            $db = Conexao::conecta();
            $sql = "SELECT nome FROM usuario WHERE email = ?";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $email);
            if ($rs->execute()) {
                if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    return $registro->nome;
                }
            }
        } catch (\PDOException $ex) {
            echo "Erro ao retornar dados do usuario" . $ex->getMessage();
        }
    }

}
