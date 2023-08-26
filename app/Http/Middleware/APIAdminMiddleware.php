<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class APIAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $login = Auth::guard('admin')->check();
        if (!$login) {
            return response()->json([
                'status' => 0,
                'message' => 'Tính năng này yêu cầu đăng nhập !',
            ]);
        }
        return $next($request);
    }
}
