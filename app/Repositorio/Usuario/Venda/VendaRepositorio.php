<?php



namespace App\Repositorio\Usuario\Venda;

use App\Models\Venda;
use App\Repositorio\Database\DatabaseRepositorio;
use Illuminate\Support\Facades\DB;


class VendaRepositorio
{
    protected $database;
    protected $venda;

    public function __construct()
    {
        $this->database = new DatabaseRepositorio();
        $this->venda = new Venda();
    }

    protected function db_conection()
    {
        return $this->venda->setInstancia(session()->get('db_instancia'));
    }

    public function lista()
    {
        $this->db_conection();
        return $this->venda->orderBy('id', 'DESC')->paginate(9);
    }

}