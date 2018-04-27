<?php

class Tarefas {

    private $idtarefas;
    private $titulo;
    private $data;
    private $descricao;
    private $prioridade;
    private $status_tarefa;
    private $fk_usuario;

    public function __construct($idTareas, $titulo, $data, $descricao, $prioridade, $status_tarefa, $fk_usuario) {
        $this->idtarefas = $idTareas;
        $this->titulo = $titulo;
        $this->data = $data;
        $this->descricao = $descricao;
        $this->prioridade = $prioridade;
        $this->status_tarefa = $status_tarefa;
        $this->fk_usuario = $fk_usuario;
    }

    function getIdtarefas() {
        return $this->idtarefas;
    }

    function setIdtarefas($idtarefas) {
        $this->idtarefas = $idtarefas;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getData() {
        return $this->data;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPrioridade() {
        return $this->prioridade;
    }

    function getStatus_tarefa() {
        return $this->status_tarefa;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPrioridade($prioridade) {
        $this->prioridade = $prioridade;
    }

    function setStatus_tarefa($status_tarefa) {
        $this->status_tarefa = $status_tarefa;
    }

    function getFk_usuario() {
        return $this->fk_usuario;
    }

    function setFk_usuario($fk_usuario) {
        $this->fk_usuario = $fk_usuario;
    }

}
