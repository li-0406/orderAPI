<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 檢查請求是否帶有 token
        $token = $request->header('Authorization');

        if (!$token ) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}