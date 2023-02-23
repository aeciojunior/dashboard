<?php

namespace App\Http\Controllers\Usuario\Venda;

use App\Http\Controllers\Controller;
use App\Repositorio\Usuario\Venda\VendaRepositorio;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    protected $vendaRepositorio;
    protected $path;
    protected $prefix;

    public function __construct()
    {
        $this->vendaRepositorio = new VendaRepositorio();
        $this->path = "usuario.venda";
        $this->prefix = "user";
    }

    public function lista()
    {

       
        return view($this->path . '.lista', ['venda' => $this->vendaRepositorio->lista()]);
    }
}
