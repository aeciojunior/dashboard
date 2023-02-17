<?php

namespace App\Repositorio\Usuario\Dashboard;

use App\Models\Caixa;
use App\Models\Estoque;
use App\Models\Venda;

class DashboardRepositorio
{
    protected $estoque;
    protected $caixa;
    protected $venda;


    public function __construct()
    {
        $this->estoque = new Estoque();
        $this->caixa = new Caixa();
        $this->venda = new Venda();
    }

    protected function db_conection($instancia)
    {
        return $instancia->setInstancia(session()->get('db_instancia'));
    }

    public function contadorEstoque()
    {
        $this->db_conection($this->estoque);
        return $this->estoque->count('id');
    }
    public function contadorVendas()
    {
       
        $this->db_conection($this->venda);
        return $this->venda->count('id');
    }
    public function contadorTotalVendas()
    {
        $this->db_conection($this->venda);
        return $this->venda->where('data', date('Y-m-d'))->sum('total_nota');
    }

    public function grafico()
    {

    }

    protected  function meses()
    {
           
    }
}
