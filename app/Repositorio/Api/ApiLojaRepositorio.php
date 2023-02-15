<?php


namespace App\Repositorio\Api;

use App\Models\Caixa;
use App\Models\Loja;
use App\Repositorio\Database\DatabaseRepositorio;

class ApiLojaRepositorio
{
    protected $loja;
    protected $db;
    protected $caixa;

    public function __construct()
    {
        $this->loja = new Loja();
        $this->db = new DatabaseRepositorio();
        $this->caixa = new Caixa();
    }

    public function cadastro($loja)
    {
       
        $cadastro = [];
        $select = $this->loja->where('cnpj_loja', $loja['cnpj_loja'])->get()->first();
        $a = $this->db->criarBanco($loja['banco_instancia']);
        if (!$select) {
            if ($cadastro = $this->loja->create($loja)) {
                //cadastro a instancia com o banco
                return response()->json(["sucess" => true, "cnpj_cadastrado"  => $loja['cnpj_loja'],"id"=>$cadastro->id,"banco_criado"=>$a], 200, ['Content-Type' => "application/json"]);
            }
            return response()->json(["sucess" => false, "cnpj_cadastrado"  => $loja['cnpj_loja'],"id"=>$select->id,"banco_criado"=>$a], 200, ['Content-Type' => "application/json"]);
        }
        $this->loja->where('cnpj_loja',$loja['cnpj_loja'])->update($loja);
        return response()->json(["sucess" => true, "cnpj_cadastrado"  => $loja['cnpj_loja'],"id"=>$select->id,"banco_criado"=>$a], 200, ['Content-Type' => "application/json", "Charset" => "utf-8"]);
    }
}
