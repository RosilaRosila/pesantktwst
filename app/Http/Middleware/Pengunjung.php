<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Pengunjung
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('pengunjung')->check()) {
            return redirect()->route('auth.login')->with('error', 'Kamu tidak memiliki akses ke halaman ini');
        }
        return $next($request);
    }


    // protected function redirectTo($request)
    // {
    //     if (!$request->expectsJson()) {
    //         return route('auth.login');
    //     }
    // }
}
