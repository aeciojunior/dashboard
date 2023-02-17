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

    protected function db_conection()
    {
        return $this->estoque->setInstancia(session()->get('db_instancia'));
    }

    public function lista()
    {
        $this->db_conection();
        return $this->estoque->orderBy('id', 'DESC')->paginate(9);
    }
    public function contador(){
        $this->db_conection();
        return $this->estoque->count('id');
    }
}
