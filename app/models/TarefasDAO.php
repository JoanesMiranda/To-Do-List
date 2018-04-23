<?php

class TarefasDAO {

    public function cadastrarTarefa(Tarefas $tarefa) {
        try {
            $db = Conexao::conecta();
            $sql = "INSERT INTO tarefas "
                    . "(titulo,data,descricao,prioridade,status_tarefa,fk_pessoa)"
                    . " VALUES (?,?,?,?,?,?)";

            $stmt = $db->prepare($sql);
            $titulo = $tarefa->getTitulo();
            $stmt->bindParam(1, $titulo);

            $data = implode("/", array_reverse(explode("/", $tarefa->getData())));
            $stmt->bindParam(2, $data);

            $descricao = $tarefa->getDescricao();
            $stmt->bindParam(3, $descricao);

            $prioridade = $tarefa->getPrioridade();
            $stmt->bindParam(4, $prioridade);

            $status = $tarefa->getStatus_tarefa();
            $stmt->bindParam(5, $status);

            $fk = $tarefa->getFk_usuario();
            $stmt->bindParam(6, $fk);

            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "<script> alert('Erro ao Salvar Atividade'); </script> " . $ex->getMessage();
        }
    }

    public function retornaIdUsuario($email) {
        try {
            $db = Conexao::conecta();
            $sql = "SELECT idpessoa FROM pessoa WHERE idpessoa"
                    . " = (SELECT fk_pessoa FROM login WHERE email = ?)";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $email);
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

    public function listarAtividades($email,$prioridade) {
        try {

            $db = Conexao::conecta();
            $sql = "SELECT * FROM tarefas WHERE fk_pessoa = (SELECT fk_pessoa FROM login WHERE email = ?) ORDER BY prioridade = ? DESC";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $email);
            $rs->bindParam(2, $prioridade);

            if ($rs->execute()) {
                $dados = array();
                while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    $dados[] = $registro;
                }
                return $dados;
            }
        } catch (PDOException $ex) {
            echo "erro ao listar as atividades" . $ex->getMessage();
        }
    }

    public function retornaPrioridade($prioridade) {
        if ($prioridade == "alta") {
            $prioridade = "badge-danger";
        } else if ($prioridade == "media") {
            $prioridade = "badge-warning";
        } else {
            $prioridade = "badge-info";
        }
        return $prioridade;
    }

    public function excluirTarefa($id) {
        try {
            $db = Conexao::conecta();
            $sql = "DELETE FROM tarefas WHERE idtarefas = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1, $id);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "Erro ao excluir atividade" . $ex->getMessage();
        }
    }

}
