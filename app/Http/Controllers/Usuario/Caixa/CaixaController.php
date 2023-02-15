<?php

namespace App\Http\Controllers\Usuario\Caixa;

use App\Http\Controllers\Controller;
use App\Repositorio\Usuario\Caixa\CaixaRepositorio;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    protected $caixaRepositorio;
    protected $path;
    protected $prefix;

    public function __construct()
    {
        $this->caixaRepositorio = new CaixaRepositorio();
    }

    public function getLista()
    {
       
        dd($this->caixaRepositorio->caixa());
    }
}
