<?php



namespace App\Repositorio\Usuario\Venda;

use App\Models\Venda;
use App\Repositorio\Database\DatabaseRepositorio;
use Illuminate\Support\Facades\DB;


class VendaRepositorio
{
    protected $database;
    protected $venda;
    protected $db;

    public function __construct()
    {
        $this->database = new DatabaseRepositorio();
        $this->venda = new Venda();
        $this->db = new DB();
    }

    protected function db_conection()
    {
        return $this->venda->setInstancia(session()->get('db_instancia'));
    }

    public function lista()
    {
        $this->db_conection();
        return $this->venda->orderBy('id', 'ASC')->paginate(9);
    }

    public function buscarVenda($inicio, $fim, $codigo = '')
    {
        $busca = '';
        $this->db_conection();
        if (!empty($codigo)) {
            $busca = $this->venda->where('codigo', 'LIKE', '%' . $codigo . '%')
                ->OrWhere('codvendedor', 'LIKE', '%' . $codigo . '%')
                ->OrWhere('numero', 'LIKE', '%' . $codigo . '%')
                ->OrWhere('codcaixa', 'LIKE', '%' . $codigo . '%')
                ->OrWhere('modelo_nf', 'LIKE', '%' . $codigo . '%')
                ->paginate(5);
        } else {
            $busca = $this->venda->whereBetween('data', [$inicio . ' 00:00:00', $fim . ' 23:00:00'])
                ->paginate(9);
        }

        return  count($busca) > 0 ? $busca :  false;
    }
}
