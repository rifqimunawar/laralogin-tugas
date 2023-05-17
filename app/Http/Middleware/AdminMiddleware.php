<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
      $user = Auth::user();
        if ($request->user() && $request->user()) {
            return $next($request);
        }
        return abort(403, 'Anda Tidak Memiliki Hak Mengakses Halaman Tersebut!!! Chuaaaakkss');
    }
}
