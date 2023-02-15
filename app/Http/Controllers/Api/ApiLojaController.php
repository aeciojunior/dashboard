<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositorio\Api\ApiLojaRepositorio;
use Illuminate\Http\Request;

class ApiLojaController extends Controller
{
    protected $apiRepositorio;
    public function __construct()
    {
        $this->apiRepositorio = new ApiLojaRepositorio();
    }

    public function cadastro(Request $request)
    { 
        return $this->apiRepositorio->cadastro($request->all());
    }
}
