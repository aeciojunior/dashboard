<?php


namespace App\Repositorio\Api;

use App\Models\Caixa;
use App\Repositorio\Database\DatabaseRepositorio;
use App\Repositorio\Database\Inserts\CaixaInsert;

class ApiCaixaRepositrio
{

    protected $db;
    protected $insert;
    protected $caixa;


    public function __construct()
    {
        $this->db = new DatabaseRepositorio();
        $this->insert = new CaixaInsert();
        $this->caixa = new Caixa();
    }

    public function cadastro($caixa)
    {

        $this->caixa->setInstancia($caixa['config']['db_instancia']);
        $data = $this->insert->insert($caixa);
        return response()->json(["sucess" => true,"retorno" => $data], 200, ['Content-Type' => "application/json", "Charset" => "utf-8"]);

    }

}
