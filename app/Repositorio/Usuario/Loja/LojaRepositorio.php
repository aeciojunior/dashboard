<?php

namespace App\Repositorio\Usuario\Loja;

use App\Models\Loja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LojaRepositorio
{

    protected $loja;
    protected $db;
    
    public function __construct()
    {
        $this->loja = new Loja();
        $this->db = new DB();
    }

    public function lojas(){


        return $this->loja->where('cnpj_cliente',Auth::user()->cnpj)->get();
    }

    public function selecionarloja($cnpj)
    {

       $busca = $this->loja->where('cnpj_loja',$cnpj)->where('cnpj_cliente',Auth::user()->cnpj)->get();
       if(!empty($busca)){
        session()->put(['cnpj_loja' =>$busca[0]->cnpj_loja]);
        session()->put(['loja_nome' => $busca[0]->nome_loja]);
        session()->put(['cnpj_cliente' => $busca[0]->cnpj_cliente]);
        session()->put('db_instancia', strtolower($busca[0]->banco_instancia));
        return true;
       }
       return false;

    }
}
