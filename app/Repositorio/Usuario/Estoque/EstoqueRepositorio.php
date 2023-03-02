<?php

namespace App\Repositorio\Usuario\Estoque;

use Illuminate\Support\Facades\DB;

use App\Models\Estoque;

class EstoqueRepositorio
{
    protected $estoque;
    protected $db;

    public function __construct()
    {
        $this->estoque = new Estoque();
        $this->db = new DB();
    }

    protected function db_conection()
    {
        return $this->estoque->setInstancia(session()->get('db_instancia'));
    }

    public function lista()
    {
        $this->db_conection();
        return $this->estoque->orderBy('codigo', 'DESC')->paginate(9);
    }
    public function contador(){
        $this->db_conection();
        return $this->estoque->count('id');
    }

    public function ultimaAtualizacao()
    {
        $busca = $this->db::connection('mysql2')->select('select created_at as data from vendas limit 1');
        return $busca[0]->data;
    }


    public function buscarProduto($produto)
    {
        $this->db_conection();
        $busca = $this->estoque->where('produto', 'LIKE', '%'.$produto.'%')
		->orWhere('codigo', 'LIKE', '%'.$produto.'%')
		->paginate(5);
       
        return  count($busca) >0 ? $busca :  false;
    
    }

}
