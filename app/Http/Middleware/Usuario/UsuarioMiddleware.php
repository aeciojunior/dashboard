<?php

namespace App\Http\Middleware\Usuario;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (isset(auth()->user()->cnpj) && (session()->get('cnpj_loja'))) {
            return $next($request);
        }
        return redirect()->route('user-lojas');
    }
}
