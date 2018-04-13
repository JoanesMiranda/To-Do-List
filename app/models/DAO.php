<?php

namespace App\Models;

interface DAO {

    public function salvar($id);

    public function remover($id);

    public function Atualizar($obj);

    public function buscar($obj);
}
