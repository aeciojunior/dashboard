<?php

namespace App\Http\Controllers\Usuario\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositorio\Usuario\Dashboard\DashboardRepositorio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $path;
    protected $prefix;
    protected $dashboardRepositorio;

    public function __construct()
    {
        $this->path = "usuario.";
        $this->prefix = "user";
        $this->dashboardRepositorio = new DashboardRepositorio();
    }

    public function dashboard()
    {
        //dd($this->dashboardRepositorio->ultimaAtualizacao());

        return view(
            $this->path . 'dashboard/dashboard',
            [
                'estoque' => $this->dashboardRepositorio->contadorEstoque(),
                'venda' => $this->dashboardRepositorio->contadorTotalVendas(),
                'meses' => $this->dashboardRepositorio->grafico()['meses'],
                'valor' => $this->dashboardRepositorio->grafico()['valor'],
            ]
        );
    }

    public function ultimaAutalizacao()
    {
        return response(
            [
                'data' => $this->dashboardRepositorio->ultimaAtualizacao()
            ]
    );
    }
}
