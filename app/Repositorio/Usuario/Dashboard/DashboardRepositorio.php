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

    
    public function contadorEstoque(){
        $this->estoque->setInstancia(session()->get('db_instancia'));
        return $this->estoque->count('id');
    }
    public function contadorVendas(){
        $this->venda->setInstancia(session()->get('db_instancia'));
        return $this->venda->count('id');
    }
    public function contadorTotalVendas(){
        $this->venda->setInstancia(session()->get('db_instancia'));
        return $this->venda->where('data',date('Y-m-d'))->sum('total_nota');
    }
}