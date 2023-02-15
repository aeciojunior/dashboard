<?php

namespace App\Http\Controllers\Adm\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $path;
    public function __construct()
    {
            $this->path = "usuario.";
    }
    public function dashboard()
    {
        return view( $this->path.'dashboard/dashboard');
    }
}
