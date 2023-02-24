<?php

namespace App\Repositorio\Usuario\Dashboard;

use App\Models\Caixa;
use App\Models\Estoque;
use App\Models\Loja;
use Illuminate\Support\Facades\DB;
use App\Models\Venda;

class DashboardRepositorio
{
    protected $estoque;
    protected $caixa;
    protected $venda;
    protected $db;
    protected $loja;


    public function __construct()
    {
        $this->estoque = new Estoque();
        $this->caixa = new Caixa();
        $this->venda = new Venda();
        $this->db = new DB();
        $this->loja = new Loja();
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
        return $this->venda->whereYear('data',date('Y'))->sum('id');
    }

    public function contadorCaixa()
    {
        $this->db_conection($this->caixa);
        return $this->caixa->whereYear('data',date('Y'))->sum('valor');
    }
    public function contadorTotalVendas()
    {
        $this->db_conection($this->venda);
        //date('Y-m-d')
        return $this->venda->whereYear('data',date('Y') )->sum('total_nota');
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

        $this->db_conection($this->venda);
        $ano =  date('Y');
        $busca = $this->db::connection('mysql2')->select("SELECT CONCAT(month(data)) mes, COUNT(id) qtde, year(data)
        FROM vendas where year(data) = {$ano}
        GROUP BY YEAR(data), MONTH(data);");
        $valor = '';

        // for ($i = 0; $i <= 1; $i++) 
        // {
        //    if(isset($busca[$i]->mes)){
        //      $valor[$i] = "". $busca[$i]->qtde ."";
        //    }else{
        //     $valor[$i] =  0;
        //    }
        // }

        foreach($busca as $key)
        {
           $valor .= $key->qtde.',';
        }

        dd($valor);
       // return '[' . rtrim($valor, ',') . ']';
    }

    public function ultimaAtualizacao()
    {
        $this->db_conection($this->venda);
        $busca = $this->db::connection('mysql2')->select('select created_at as data from vendas limit 1');
        return $busca[0]->data;
    }

    public function lojaInformation($coluna)
    {
        return $this->loja->where('cnpj_loja', session()->get('cnpj_loja'))->get([$coluna]);
    }

    protected  function TotalMesses()
    {

        $ano =  date('Y');
        $busca = $this->db::connection('mysql2')->select("SELECT CONCAT(month(data)) mes, COUNT(id) qtde, year(data),sum(total_nota) as total
        FROM vendas where year(data) = {$ano}
        GROUP BY YEAR(data), MONTH(data);");
        $valor = '';

        for ($i = 0; $i <= 11; $i++) {
            if (empty($busca[$i]->total)) {
                $valor .= '0' . ',';
            } else {
                $valor .= $busca[$i]->total . ',';
            }
        }

        // foreach($busca as $key)
        // {
        //    $valor .= $key->total.',';
        // }

        
        return '[' . rtrim($valor, ',') . ']';
    }

    public function vendaDiaria(){
        $data =  date('Y-m-d');
        $busca =(object) [];
        $this->db_conection($this->venda);
        $busca = $this->venda->whereBetween('data',["{$data} 00:00:00","{$data} 23:00:00"])->limit(10)->get();
    
        return  isset($busca) >0 ? (object) $busca : $busca;
    }

    public function formasPagamentoDiario()
    {
        $data =  date('Y-m-d');
        $busca =(object) [];
        $this->db_conection($this->venda);
      
        $busca = $this->db::connection('mysql2')->select("
        select 
        sum(meio_dinheiro) as meio_dinheiro,sum(meio_cartaodeb) as meio_cartaodeb,sum(meio_cartaocred) as meio_cartaocred,sum(meio_chequeav) as meio_chequeav,
        sum(meio_crediario) as meio_crediario,sum(meio_outros) as meio_outros,sum(meio_chequeap) as meio_chequeap,sum(meio_chequeav) as meio_chequeav,sum(meio_crediario) as meio_crediario
        from vendas
        WHERE data BETWEEN ('{$data} 00:00:00') AND ('{$data} 23:00:00');");
         return  count($busca) >0 ? $busca :  false;
    }
}
