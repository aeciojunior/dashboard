<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositorio\Database\DatabaseRepositorio;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Caixa extends Model
{
    use HasFactory;

    protected $connection = 'mysql2'; //pass the connection name here
    protected $database;

    protected $fillable = [
        "codigo",
        "codcaixa",
        "codoperador",
        "data",
        "saida",
        "entrada",
        "codconta",
        "historico",
        "movimento",
        "valor",
        "codnfsaida",
        "posto",
        "codigo_venda",
        "hora",
    ];

    public function __construct()
    {
        $this->connection = 'mysql2';
        $this->database =  new DatabaseRepositorio();
        
    }

    public function setInstancia($instancia = null)
    {
        if (!is_null($instancia)) {
           
            return  $this->database->setConfigDBInstancia($instancia);
        }
    }

   
}
