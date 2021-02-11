<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            //Verifica se o usuário é um Admin
            if(!Auth::user()->isAdmin){
                return redirect()->route('fallback', ['fallbackPlaceholder' => '404']);
            } else {
                return $next($request);
            }
        } else {
            return redirect()->route('fallback', ['fallbackPlaceholder' => '404']);
        }
    }
}
