<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$e): Response
    {
        if($request->age <= 20){
            return response()->json(['message'=>'年齡必須大於等於20','data'=>$e], 403);
        }
        return $next($request);
    }
}