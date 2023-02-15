<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositorio\Api\ApiUsuarioRepositorio;
use Illuminate\Http\Request;

class ApiUsuarioController extends Controller
{
    protected $apiRepositorio;
    
    public function __construct()
    {
        $this->apiRepositorio = new ApiUsuarioRepositorio();
    }

    public function cadastro(Request $request)
    { 
        return $this->apiRepositorio->cadastro($request->all());
    }
}
