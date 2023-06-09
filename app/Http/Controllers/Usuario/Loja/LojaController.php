<?php

namespace App\Http\Controllers\Usuario\Loja;

use App\Http\Controllers\Controller;
use App\Repositorio\Usuario\Loja\LojaRepositorio;
use Illuminate\Http\Request;

class LojaController extends Controller
{

    protected $lojaRepositorio;
    protected $path;
    protected $prefix;

    public function __construct()
    {
        $this->lojaRepositorio = new LojaRepositorio();
        $this->path = "usuario/";
        $this->prefix = "user";
    }

    public function lojas()
    {
        
        return view($this->path.'loja/loja', ['lojas' => (object) $this->lojaRepositorio->lojas()]);
    }

    public function lojaSelecionada(Request $request,$cnpj_loja)
    {
        return $this->lojaRepositorio->selecionarloja($cnpj_loja) ? redirect()->to($this->prefix.'/dashboard') : redirect()->route($this->prefix.'lojas');
    }
}
