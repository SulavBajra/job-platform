<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Employer;

class CheckIfEmployer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $user = $request->user();
        if(!$user || !$user instanceof Employer){
            return response()->json([
                'message' => 'Restricted',
            ],403);
        }
        return $next($request);
    }
}
