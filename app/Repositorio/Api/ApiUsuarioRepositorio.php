<?php


namespace App\Repositorio\Api;

use App\Models\User;

class ApiUsuarioRepositorio
{
    protected $usuario;

    public function __construct()
    {
        $this->usuario = new User();
    }

    public function cadastro($usuario)
    {
        $cadastro = [];
        $select = $this->usuario->where('cnpj', $usuario['cnpj'])->get()->first();
        if (!$select) {
            $usuario['password'] = bcrypt($usuario['password']);

            if ($cadastro = $this->usuario->create($usuario)) {
                
                return response()->json(["sucess" => true, "cnpj_cadastrado"  => $usuario['cnpj'],"id"=>$cadastro->id], 200, ['Content-Type' => "application/json"]);
            }
            return response()->json(["sucess" => false, "cnpj_cadastrado"  => $usuario['cnpj'],"id"=>$select->id], 200, ['Content-Type' => "application/json"]);
        }
        return response()->json(["sucess" => true, "cnpj_cadastrado"  => $usuario['cnpj'],"id"=>$select->id], 200, ['Content-Type' => "application/json", "Charset" => "utf-8"]);
    }
}
