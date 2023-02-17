<?php



namespace App\Repositorio\Usuario\Caixa;

use App\Models\Caixa;
use App\Repositorio\Database\DatabaseRepositorio;
use Illuminate\Support\Facades\DB;


class CaixaRepositorio
{
    protected $database;
    protected $caixa;

    public function __construct()
    {
        $this->database = new DatabaseRepositorio();
        $this->caixa = new Caixa();
    }

    protected function db_conection()
    {
        return $this->caixa->setInstancia(session()->get('db_instancia'));
    }

    public function lista()
    {
        $this->db_conection();
        return $this->caixa->orderBy('id', 'DESC')->paginate(9);
    }

}
