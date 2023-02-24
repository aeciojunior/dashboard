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
        

      
        return view(
            $this->path . 'dashboard/dashboard',
            [
              
                'meses' => $this->dashboardRepositorio->grafico()['meses'],
                'valor' => $this->dashboardRepositorio->grafico()['valor'],
                'vendas_diaria' => $this->dashboardRepositorio->vendaDiaria(),
                'forma_pagamento' => $this->dashboardRepositorio->formasPagamentoDiario()
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
                'caixaAtual' => $this->dashboardRepositorio->contadorCaixaAtual()
            ]
    );
    }
}
