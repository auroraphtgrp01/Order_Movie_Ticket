<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class APIClientMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $login = Auth::guard('client')->check();
        if (!$login) {
            return response()->json([
                'status' => 0,
                'message' => 'Chức năng yêu cầu phải đăng nhập !'
            ]);
        }
        return $next($request);
    }
}
