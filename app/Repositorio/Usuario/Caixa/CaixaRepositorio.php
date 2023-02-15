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

    public function caixa()
    {
        $this->caixa->setInstancia(session()->get('db_instancia'));
        //return $this->caixa->where('id',1)->get();
        return DB::connection('mysql2')->table('estoques')->select('*')->get();
    }
    public function cadastro($caixa)
    {
         return $caixa;
    }
    
}
