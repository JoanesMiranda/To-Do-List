<?php
include './Conexao.php';
namespace App\Models;

class UsuarioDAO {

    public function salvarBD(Usuario $usuario) {
      
        try {
            $db = Conexao::conecta();
            $sql = "INSERT INTO pessoa (nome,telefone,endereco,numero)"
                    . " VALUES (?,?,?,?)";

            $stmt = $db->prepare($sql);

            $nome = $usuario->getNome();
            $stmt->bindParam(1, $nome);

            $telefone = $usuario->getTelefone();
            $stmt->bindParam(2, $telefone);

            $endereco = $usuario->getEndereco;
            $stmt->bindParam(3, $endereco);

            $numero = $usuario->getNumero();
            $stmt->bindParam(4, $numero);

            return $stmt->execute();
        } catch (PDOException $ex) {

             echo "<script> alert('Erro ao alterar Atividade'); </script>" . $ex->getMessage();
        }
    }

}