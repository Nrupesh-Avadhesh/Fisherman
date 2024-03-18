<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (Auth::user()->role == 'superadmin' || Auth::user()->role_code == 'admin')) {
            return $next($request);
        } elseif(Auth::check() && (Auth::user()->role == 'client')){
            return redirect()->route('home');
        } else {
            Session::flush();
            Auth::logout();
            return redirect()->route('home');
        } 
    }
}
