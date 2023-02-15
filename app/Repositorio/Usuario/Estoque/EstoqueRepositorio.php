<?php

namespace App\Repositorio\Usuario\Estoque;

use App\Models\Estoque;

class EstoqueRepositorio
{
    protected $estoque;
    

    public function __construct()
    {
        $this->estoque = new Estoque();
    }

    public function lista()
    {
        $this->estoque->setInstancia(session()->get('db_instancia'));
        return $this->estoque->paginate(9);
    }
    public function contador(){
        $this->estoque->setInstancia(session()->get('db_instancia'));
        return $this->estoque->count('id');
    }
}
