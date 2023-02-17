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
        $this->prefix = 'user';
        $this->path = 'usuario.caixa';
        $this->caixaRepositorio = new CaixaRepositorio();
    }

    public function getLista()
    {
       
       
        return view($this->path.'.lista',['caixa' => $this->caixaRepositorio->lista(),'contador'=>0]);

    }
}
