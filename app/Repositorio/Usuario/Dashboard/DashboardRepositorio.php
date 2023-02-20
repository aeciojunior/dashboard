<?php

namespace App\Repositorio\Usuario\Dashboard;

use App\Models\Caixa;
use App\Models\Estoque;
use Illuminate\Support\Facades\DB;
use App\Models\Venda;

class DashboardRepositorio
{
    protected $estoque;
    protected $caixa;
    protected $venda;
    protected $db;


    public function __construct()
    {
        $this->estoque = new Estoque();
        $this->caixa = new Caixa();
        $this->venda = new Venda();
        $this->db = new DB();
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
        $arr = [
            'meses' => $this->messes(),
            'valor' => $this->TotalMesses()
        ];

        return $arr;
    }

    protected  function messes()
    {


        $busca = $this->db::connection('mysql2')->select('SELECT CONCAT(month(data)) mes, COUNT(id) qtde, year(data)
        FROM vendas where year(data) = 2019
        GROUP BY YEAR(data), MONTH(data);');
        $valor = '';

        for ($i=0; $i <= 12 ; $i++) {
            if(empty($busca[$i]->qtde)){
                $valor .= '0'.',';
            }else{
                $valor .= $busca[$i]->qtde.',';
            }
        }

        // foreach($busca as $key)
        // {
        //    $valor .= $key->qtde.',';
        // }

        return '['. rtrim($valor,','). ']';

    }

    protected  function TotalMesses()
    {


        $busca = $this->db::connection('mysql2')->select('SELECT CONCAT(month(data)) mes, COUNT(id) qtde, year(data),sum(total) as total
        FROM vendas where year(data) = 2019
        GROUP BY YEAR(data), MONTH(data);');
        $valor = '';

        for ($i=0; $i <= 12 ; $i++) {
            if(empty($busca[$i]->total)){
                $valor .= '0'.',';
            }else{
                $valor .= $busca[$i]->total.',';
            }
        }

        // foreach($busca as $key)
        // {
        //    $valor .= $key->total.',';
        // }

        return '['. rtrim($valor,','). ']';

    }
}
