<?php

namespace App\Models;

use App\Repositorio\Database\DatabaseRepositorio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql2'; //pass the connection name here
    protected $database;

    public function __construct()
    {
        $this->connection = 'mysql2';
        $this->database =  new DatabaseRepositorio();
        $this->database->setConfigDBInstancia();
    }

    public function setInstancia($instancia = null)
    {
        if (!is_null($instancia)) {
           
            return  $this->database->setConfigDBInstancia($instancia);
        }
    }
}
