<?php

namespace App\Models;

class Tarefas {

    private $titulo;
    private $data;
    private $descricao;
    private $prioridade;
    private $status_tarefa;

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

}
