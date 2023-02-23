<?php



namespace App\Repositorio\Usuario\Caixa;

use App\Models\Caixa;
use App\Repositorio\Database\DatabaseRepositorio;
use Illuminate\Support\Facades\DB;


class CaixaRepositorio
{
    protected $database;
    protected $caixa;
    protected $db;

    public function __construct()
    {
        $this->database = new DatabaseRepositorio();
        $this->caixa = new Caixa();
        $this->db = new DB();
    }

    protected function db_conection()
    {
        return $this->caixa->setInstancia(session()->get('db_instancia'));
    }


    public function lista()
    {
        $this->db_conection();
        return $this->caixa->orderBy('data', 'desc')->paginate(9);
    }

    public function buscaCaixa($inicio, $fim, $codigo = '')
    {
        $busca = '';
        $this->db_conection();
        if (!empty($codigo)) {
            $busca = $this->caixa->where('codigo', 'LIKE', '%' . $codigo . '%')->OrWhere('codcaixa', 'LIKE', '%' . $codigo . '%')
                ->where('codoperador', 'LIKE', '%' . $codigo . '%')
                ->paginate(5);
        } else {
            $busca = $this->caixa->whereBetween('data', [$inicio . ' 00:00:00', $fim . ' 23:00:00'])
                ->paginate(9);
        }

        return  count($busca) > 0 ? $busca :  false;
    }
}
