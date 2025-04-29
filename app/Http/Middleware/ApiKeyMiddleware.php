<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware to validate incoming API requests using an API key.
 */
class ApiKeyMiddleware
{
    /**
     * Handle an incoming request and check for a valid API key.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = env('API_KEY');
        $clientKey = $request->header('X-API-KEY');

        if (! $clientKey || $clientKey !== $apiKey) {
            return response()->json(['error' => 'Unauthorized. Invalid API key.'], 401);
        }

        return $next($request);
    }
}
