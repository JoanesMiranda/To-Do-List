<?php

namespace App\Models;

use PDO;

class TarefasDAO {

    public function cadastrarTarefa(Tarefas $tarefa) {
        try {
            $db = Conexao::conecta();
            $sql = "INSERT INTO tarefas "
                    . "(titulo,data,descricao,prioridade,status_tarefa,fk_usuario)"
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
        } catch (\PDOException $ex) {
            echo "<script> alert('Erro ao Salvar Atividade'); </script> " . $ex->getMessage();
        }
    }

    public function retornaIdUsuario($email) {
        try {
            $db = Conexao::conecta();
            $sql = "SELECT idusuario FROM usuario WHERE email = ?";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $email);
            if ($rs->execute()) {
                if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    return $registro->idusuario;
                }
            }
        } catch (\PDOException $ex) {
            echo "Erro ao retornar dados do usuario" . $ex->getMessage();
        }
    }

    public function listarAtividades($email, $prioridade) {
        try {

            $db = Conexao::conecta();
            $sql = "SELECT * FROM tarefas WHERE fk_usuario = (SELECT idusuario FROM usuario WHERE email = ?) AND tarefas.status_tarefa = 'não concluida' ORDER BY prioridade = ? DESC";
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
        } catch (\PDOException $ex) {
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

    public function listarTarefasByLike($email, $titulo) {
        try {

            $db = Conexao::conecta();
            //falta terminar esse select,, pois não está funcionado
            $sql = "SELECT * FROM tarefas WHERE fk_usuario = (SELECT idusuario FROM usuario WHERE email = ?)"
                    . " AND tarefas.titulo LIKE '%" . $titulo . "%' AND tarefas.status_tarefa = 'não concluido' ";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $email);

            if ($rs->execute()) {
                $dados = array();
                while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    $dados[] = $registro;
                }
                return $dados;
            }
        } catch (\PDOException $ex) {
            echo "erro ao listar as tarefas" . $ex->getMessage();
        }
    }

    public function excluirTarefa($id) {
        try {
            $db = Conexao::conecta();
            $sql = "DELETE FROM tarefas WHERE idtarefas = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1, $id);
            return $stmt->execute();
        } catch (\PDOException $ex) {
            echo "Erro ao excluir atividade" . $ex->getMessage();
        }
    }

    public function atualizarTarefa(Tarefas $tarefa) {
        try {
            $db = Conexao::conecta();
            $sql = "UPDATE tarefas SET titulo = ?,data = ?"
                    . ",descricao = ?,prioridade = ?,status_tarefa = ? WHERE idtarefas = ?";

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

            $idTarefa = $tarefa->getIdtarefas();
            $stmt->bindParam(6, $idTarefa);

            return $stmt->execute();
        } catch (\PDOException $ex) {
            echo "<script> alert('Erro ao atualizar tarefa'); </script> " . $ex->getMessage();
        }
    }

    public function listarTarefasFinalizadas($email) {
        try {

            $db = Conexao::conecta();
            $sql = "SELECT * FROM tarefas WHERE fk_usuario = (SELECT idusuario FROM usuario WHERE email = ?) AND tarefas.status_tarefa = 'concluida' ORDER BY data ASC";
            $rs = $db->prepare($sql);
            $rs->bindParam(1, $email);

            if ($rs->execute()) {
                $dados = array();
                while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                    $dados[] = $registro;
                }
                return $dados;
            }
        } catch (\PDOException $ex) {
            echo "erro ao listar as atividades" . $ex->getMessage();
        }
    }

}
