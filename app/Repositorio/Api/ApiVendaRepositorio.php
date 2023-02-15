<?php


namespace App\Repositorio\Api;


use App\Models\Venda;
use App\Repositorio\Database\DatabaseRepositorio;
use App\Repositorio\Database\Inserts\VendaInsert;

class ApiVendaRepositorio
{

    protected $db;
    protected $insert;
    protected $venda;


    public function __construct()
    {
        $this->db = new DatabaseRepositorio();
        $this->insert = new VendaInsert();
        $this->venda= new Venda();
    }

    public function cadastro($venda)
    {

        $this->venda->setInstancia($venda['config']['db_instancia']);
        $data = $this->insert->insert($venda);
        return response()->json(["sucess" => true,"retorno" => $data], 200, ['Content-Type' => "application/json", "Charset" => "utf-8"]);

    }

}
