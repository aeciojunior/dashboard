<?php


namespace App\Repositorio\Api;


use App\Models\Estoque;
use App\Repositorio\Database\DatabaseRepositorio;
use App\Repositorio\Database\Inserts\EstoqueInsert;

class ApiEstoqueRepositorio
{

    protected $db;
    protected $insert;
    protected $estoque;


    public function __construct()
    {
        $this->db = new DatabaseRepositorio();
        $this->insert = new EstoqueInsert();
        $this->estoque = new Estoque();
    }

    public function cadastro($estoque)
    {

        $this->estoque->setInstancia($estoque['config']['db_instancia']);
        $data = $this->insert->insert($estoque);
        return response()->json(["sucess" => true,"retorno" => $data], 200, ['Content-Type' => "application/json", "Charset" => "utf-8"]);

    }

}
