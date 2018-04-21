<?php

class UsuarioDAO {

    public function salvarUsuario(Usuario $usuario) {

        try {
            $db = Conexao::conecta();
            $sql = "INSERT INTO pessoa (nome,telefone,endereco,numero)"
                    . " VALUES (?,?,?,?)";

            $stmt = $db->prepare($sql);

            $nome = $usuario->getNome();
            $stmt->bindParam(1, $nome);

            $telefone = $usuario->getTelefone();
            $stmt->bindParam(2, $telefone);

            $endereco = $usuario->getEndereco();
            $stmt->bindParam(3, $endereco);

            $numero = $usuario->getNumero();
            $stmt->bindParam(4, $numero);

            return $stmt->execute();
        } catch (PDOException $ex) {

            echo "<script> alert('Erro'); </script>" . $ex->getMessage();
        }
    }

    public function retornaUsuario($email)
    {
        try
        {
            $db = Conexao::conecta();  
            $sql = "SELECT nome FROM pessoa WHERE idpessoa = (SELECT fk_pessoa FROM login WHERE email = ?)";  
            $rs = $db->prepare($sql);
            $rs->bindParam(1,$email);
            if($rs->execute())
            {
                $dados = array();
                if($registro = $rs->fetch(PDO::FETCH_OBJ))
                {
                    return $registro->nome;
                }
            }
        } catch (PDOException $ex) {
            echo "Erro ao retornar dados do usuario".$ex->getMessage();
        }
    }

}
