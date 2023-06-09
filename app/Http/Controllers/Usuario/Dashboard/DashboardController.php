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


      //  var_dump($this->dashboardRepositorio->formasPagamentoDiario());die();
        return view(
            $this->path . 'dashboard/dashboard',
            [
                'valor' => $this->dashboardRepositorio->grafico()['valor'],
                'meses' => $this->dashboardRepositorio->grafico()['meses'],
                'vendas_diaria' => $this->dashboardRepositorio->vendaDiaria(),
                'forma_pagamento' => $this->dashboardRepositorio->formasPagamentoDiario()
            ]
        );
    }

    public function grafico()
    {
        return response(
            [
                'valor' => $this->dashboardRepositorio->grafico()['valor'],
                'meses' => $this->dashboardRepositorio->grafico()['meses'],
                'forma_pagamento' => $this->dashboardRepositorio->formasPagamentoDiario(),
                'vendas_diaria' => $this->dashboardRepositorio->vendaDiaria(),
            ]
        );
    }

    public function ultimaAutalizacao()
    {
        

        return response(
            [
                'data' => $this->dashboardRepositorio->ultimaAtualizacao(),
                'cnpj' => $this->dashboardRepositorio->lojaInformation('cnpj_loja'),
                'nome' => $this->dashboardRepositorio->lojaInformation('nome_loja'),
                'estoque' => $this->dashboardRepositorio->contadorEstoque(),
                'venda' => $this->dashboardRepositorio->contadorTotalVendas(),
                'caixa' => $this->dashboardRepositorio->contadorCaixa(),
                'caixaAtual' => $this->dashboardRepositorio->contadorCaixaAtual(),
                'valor' => $this->dashboardRepositorio->grafico()['valor'],
                'meses' => $this->dashboardRepositorio->grafico()['meses'],
                'forma_pagamento' => $this->dashboardRepositorio->formasPagamentoDiario(),
                'vendas_diaria' => $this->dashboardRepositorio->vendaDiaria(),
                'total_diario' => $this->dashboardRepositorio->contadorValorTotalDiario(),
            ]
        );
    }
}
